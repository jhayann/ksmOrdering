<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Customer;
use Config;
use Session;
class CustomerController extends Controller
{

    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['authenticate','index','setSession','register']]);
    }

    public function setSession(Request $request)
    {
        if($request->ajax())
        {
            session(['customer_token' =>$request->token]);
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
            return session('customer_token');
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
        return redirect()->route('customerLogin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
}
