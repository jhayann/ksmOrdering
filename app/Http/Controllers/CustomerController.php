<?php

namespace App\Http\Controllers;

use App\Notifications\customerRegisteredSuccessfully; 

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Customer;
use Config;
use Session;
use App\Product;
use App\Cart;
use DB;
use App\Orders;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{

    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
       //$this->middleware('jwt.auth', ['except' => ['authenticate','index','setSession','register','store','update']]);
    }

    public function setSession(Request $request)
    {
        if($request->ajax())
        {
            session(['customer_token' =>$request->token]);
            session(['customer_email' =>$request->email]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->exists('customer_token'))
        {
           return redirect('customer/desktop/home?token='.session('customer_token'));
        }
     
        return view('customer.login');
    }

    public function authenticate(Request $request)
    {
        if($request->ajax())
        {
        $credentials = $request->only('email','password');
        
      /*  try {
         Config::set('jwt.user', 'App\Customer'); 
		  Config::set('auth.providers.users.model', \App\Customer::class);
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
               return response()->json(['error' => 'INVALID CREDENTIALS']);
            }
            
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        } */
             Config::set('auth.providers.users.model', \App\Customer::class);
            if(Auth::attempt($credentials)){
                // if no errors are encountered we can return a JWT
      
           $token = bcrypt($credentials['email']);
            
          return response()->json(compact('token'));
            } else {
                return response()->json(['error' => 'INVALID CREDENTIALS']);
            }
        }
      
    }

    public function home(Request $request)
    {
        if(session()->exists('customer_token'))
        {
           // return session('customer_token');
         $user = session('customer_email');
        $customer = Customer::where('email',$user)->get();
        return view('customer.home')->with('customer',$customer);
        } 
        else 
        {
            return redirect()->route('customerLogin');
        }
    }

     public function DesktopHome(Request $request)
    {
        if(session()->exists('customer_token'))
        {
           // return session('customer_token');
            
          //  return view('customer.home');
        $user = session('customer_email');
        $customer = Customer::where('email',$user)->get();
         $order = Orders::where('userid',session('customer_email'))->where('status',0)->get();
        return view('customer.home')->with('customer',$customer)->with('order',$order);
        } 
        else 
        {
            return redirect()->route('customerLogin');
        }
    }
    public function register()
    {
        return view('customer.register');
    }

    public function logout()
    {
        session()->forget('customer_token');
        session()->forget('customer_email');
        return redirect()->route('customerLogin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request->validate([
               'firstname' => 'required|string|max:100',
                'middlename' => 'required|string|max:100',
                'lastname' => 'required|string|max:100',
                'email' => 'required|string|email|max:255|unique:customers',
                'password' => 'required|string|min:6|confirmed' ,
                'address' => 'required|string',
                'cpnumber'=>'required|min:11'
        ]);  
        $activation = str_random(30).time();
        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->middlename = $request->middlename;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->number = $request->cpnumber;
        $customer->profileimg =null;           
        $customer->activation_code = $activation;
        $customer->save(); 
    
       /*----------- SEND email activation link to customer ------------- */
        $user = Customer::where('email',  $request->email)->first();
        $user->notify(new customerRegisteredSuccessfully($user));
        /* ------------------------------------------------------------------------- */
        return redirect()->route('customerLogin')->with('success','You have successfully register. Please login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      
          $this->validate($request,[
                'firstname' => 'required|string',
                'middlename' => 'required|string',
                'lastname' => 'required|string',
                'birthdate' => 'required',
                'gender' => 'required|string',
                'email' => 'required|string|email|max:255',
                'address' => 'required',
                'contact' => 'required|min:11'              
                ]);
          $image = $request->file('photo');
        if($image != null){
        $newname =$request->firstname . '-' . rand() . '.' . $image->getClientOriginalExtension();
        } 
    
        $customer = Customer::find($request->id);
        $customer->firstname = $request->firstname;
        $customer->middlename = $request->middlename;
        $customer->lastname = $request->lastname;
        $customer->birthdate = $request->birthdate;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->number = $request->contact;
        if($image != null){
        $customer->profileimg = $newname;
       
        }
        $customer->save();
        if($image != null) {
        $request->file('photo')->move("img/users", $newname);
        }
        return back()->with('success',"Your profile has been updated!");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function showProduct()
    {
        $product = Product::where('active',1)->get();
        return view('customer.product')->with('products',$product);
    }
     public function desktopProfile()
    {
        /*Config::set('auth.providers.users.model', \App\Customer::class);
         $user = Auth::user()->email;*/
    
      $user = session('customer_email');
        $customer = Customer::where('email',$user)->get();
        return view('customer.profile')->with('customer',$customer);
    }
    
     public function activateUser(string $activationCode)
    {
      
            $customer = app(Customer::class)->where('activation_code', $activationCode)->first();
            if (!$customer) {
                return "The code does not exist for any user in our system.";
            }
            $customer->status = "activated";
            $customer->activation_code = null;
            $customer->save();
           
       
        return redirect()->to('/customer/desktop/home');
     }
    
    public function resendactivation($id)
    {
    
        $customer_id = session('customer_email');
         $activation = str_random(30).time();
        $customer = Customer::find($id);
        $customer->activation_code = $activation;
        $customer->save();
        
        $user = Customer::where('id',  $id)->first();
        $user->notify(new customerRegisteredSuccessfully($user));
        return back()->with('success',"Email activation resend successfull!");
    }
    
    public function myCart()  
    {
        $user = session('customer_email');
        //$carts = Cart::where('user_id',$user)->get();
        $mycart = DB::table('products')
            ->join('carts', 'products.id','=','carts.product_id')
            ->select('products.name', 'products.amount','carts.*')->get();
       return view('customer.cart')->with('carts',$mycart)->with('grandtotal','0');
    }
    
    public function addCart(Request $request)  
    {
        $cart = new Cart();
        $cart->product_id = $request->productid;
        $cart->user_id = $request->userid;
        $cart->save();
    }
    public function countCart(Request $request)  
    {
         if($request->ajax())
        {
             $count = Cart::where('user_id',$request->userid)->count();
             return response($count);
         }
    }
    
    public function updateCart(Request $request)  
    {
         Cart::where('id',$request->itemid)
            ->where('user_id',$request->userid)
            ->update(['qty'=>$request->qty]);
       
    }
    public function placeOrder(Request $request)  
    {
        //$orders  = json_encode($request->order_data);
        $order = new Orders();
        $order->userid = session('customer_email');
        $order->order_data =  $request->order_data;
        $order->total = $request->total;
        $order->save();
        
        Cart::where('user_id',session('customer_email'))->delete();
        return redirect()->route('customer.ordercompleted');
    }
    public function getOrders()  
    {
        $order = Orders::where('userid',session('customer_email'))->get();
        return view('customer.orders',compact('order'));
    }
    public function orderCompleted()
    {
        return view('customer.ordercomplete');
    }
    
}
