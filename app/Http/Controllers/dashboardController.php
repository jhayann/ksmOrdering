<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notification;
use App\Customer;
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
            return view('admin.dashboard')->with('notifications',$notification);
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
			0 => 'name',
			1 => 'username',
			2 => 'email',
			3 => 'address',
            4 => 'number'
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
			$posts = Customer::where('name', 'like', "%{$search}%")
                            ->orWhere('username','like',"%{$search}%")
							->orWhere('email','like',"%{$search}%")
							->orWhere('number','like',"%{$search}%")
							->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
			$totalFiltered = Customer::where('name', 'like', "%{$search}%")
                            ->orWhere('username','like',"%{$search}%")
							->orWhere('email','like',"%{$search}%")
                	        ->orWhere('number','like',"%{$search}%")
							->count();
		}
        
        $data = array();
        //date('d-m-Y H:i:s',strtotime($r->created_at));
        if($posts){
			foreach($posts as $r){
				$nestedData['name'] = $r->name;
                $nestedData['username'] = $r->username;
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
    
  
}
