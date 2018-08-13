<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notification;
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
    
  
}
