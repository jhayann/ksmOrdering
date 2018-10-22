<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notification;
use App\Customer;
use App\Product;
use App\Helpers\Helper;
use Image;
use App\Orders;
class dashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = null)
    {
        if($page == "register")
        {
            $notification =  Notification::all();
            return view('auth.register')->with('notifications',$notification);
        }else if($page=="managereseller"){
            $customers = Customer::all();
              $notifications =  Notification::all();
            return view('pages.manageresell')->with('notifications',$notifications)->with('customers',$customers);
        } else if($page==null){
            $notification =  Notification::all();
            $order = Orders::where('status',0)->get();
            return view('admin.dashboard',compact('order'))->with('notifications',$notification);
        }
        return abort(404);
        
    }
    
        public function notif()
    {
        $notification =  Notification::all();
        
    }
    
    public function insertadmin(Request $request)
    {
            if($request->ajax())
            {
                $this->validate($request,[
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6'
                ]);
                $name = $request->input('name');
                $email = $request->input('email');
                $password = $request->input('password');

                    $user = new User();
                    $user->name = $name;
                    $user->email = $email;
                    $user->password = bcrypt($password);
                    $user->save();
                return response()->view('admin.create');
            }
    }

    public function resellerDataProccessor(Request $request)
    {
   // print_r($request->all());
       
        $columns = array(
            0 => 'firstname',
            1 => 'middlename',
			2 => 'lastname',
			3 => 'email',
			4 => 'address',
            5 => 'number'
		); 
        $totalData =Customer::count();
		$limit = $request->input('length');
		$start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        
		if(empty($request->input('search.value'))){
			$posts = Customer::offset($start)
					->limit($limit)
					->orderBy($order,$dir)
					->get();
			$totalFiltered = Customer::count();
		}else{
			$search = $request->input('search.value');
			$posts = Customer::where('firstname', 'like', "%{$search}%")
                            ->orWhere('middlename','like',"%{$search}%")
                            ->orWhere('lastname','like',"%{$search}%")
							->orWhere('email','like',"%{$search}%")
							->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
            $totalFiltered = Customer::where('firstname', 'like', "%{$search}%")
                             ->orWhere('middlename','like',"%{$search}%")
                            ->orWhere('lastname','like',"%{$search}%")
							->orWhere('email','like',"%{$search}%")
                	       
							->count();
		}
        
        $data = array();
        //date('d-m-Y H:i:s',strtotime($r->created_at));
        if($posts){
			foreach($posts as $r){
                $nestedData['firstname'] = $r->firstname;
                $nestedData['middlename'] = $r->middlename;
                $nestedData['lastname'] = $r->lastname;
				$nestedData['email'] = $r->email;
				$nestedData['address'] = $r->address;
				$nestedData['number'] = $r->number;
				$data[] = $nestedData;
			}
		}
        
        $json_data = array(
			"draw"			=> intval($request->input('draw')),
			"recordsTotal"	=> intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data
		);
		
		echo json_encode($json_data);
        
    }
    
    public function storeProduct(Request $request)
    {
           $this->validate($request,[
           'photo' => 'required|image|max:2048',
                'name' => 'required|string',
                'categorie' => 'required',
                   'volume' => 'required',
                'price' => 'required|min:2',
                   'details' => 'required'
                
                ]);
          $image = $request->file('photo');
            $newname = rand() . '.' . $image->getClientOriginalExtension();
            $product = new Product();
            $product->name = $request->name;
            $product->categorie = $request->categorie;
            $product->volume = $request->volume;
            $product->details = $request->details;
            $product->amount = $request->price;
            $product->image = $newname;
            $product->save();
            Image::make($request->file('photo'))->resizeCanvas(650,350)->save("img/portfolio/thumbnails/".$newname);
            $request->file('photo')->move("img/portfolio/fullsize", $newname);
         //copy("img/portfolio/fullsize/".$newname, "img/portfolio/thumbnails/".$newname);
        
       
     return back()->with('success',"Your new product has been added!");

    }
    public function deleteadmin(Request $request) 
    {
        $id = $request->id;
        $admin = new User();
        User::where('id',$id)->delete();
    }
    
    public function changestatProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->active = $request->status;
        $product->save();
    }
    
    public function countOrders(Request $request)
    {
         if($request->ajax())
        {
             $count = Orders::where('status',0)->count();
             if($count == 0){
             $count ="";}
             return response($count);
         }
    }
  
}
