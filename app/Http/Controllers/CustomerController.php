<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Customer;
use Config;
use Session;
use App\Product;
class CustomerController extends Controller
{

    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['authenticate','index','setSession','register','store','update']]);
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
           return redirect('customer/home?token='.session('customer_token'));
        }
     
        return view('customer.login');
    }

    public function authenticate(Request $request)
    {
        if($request->ajax())
        {
        $credentials = $request->only('email','password');
        
        try {
         Config::set('jwt.user', 'App\Customer'); 
		  Config::set('auth.providers.users.model', \App\Customer::class);
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
               return response()->json(['error' => 'INVALID CREDENTIALS']);
            }
            
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
       return response()->json(compact('token'));
        }
      
    }

    public function home(Request $request)
    {
        if(session()->exists('customer_token'))
        {
           // return session('customer_token');
            return view('pages.customerportal');
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
            return view('customer.home');
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
        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->middlename = $request->middlename;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->number = $request->cpnumber;
        $customer->profileimg =null;
        $customer->save();
        return redirect()->route('customerLogin');
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
                'gender' => 'required',
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
        $product = Product::all();
        return view('customer.product')->with('products',$product);
    }
     public function desktopProfile()
    {
        $customer =      Customer::all();
        return view('customer.profile')->with('customer',$customer);
    }
}
