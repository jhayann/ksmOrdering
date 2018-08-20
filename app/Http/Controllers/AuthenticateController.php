<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Customer;
use Config;
class AuthenticateController extends Controller
{
    
    public function __construct()
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
       $this->middleware('jwt.auth', ['except' => ['authenticate']]);
   }
   
    
      public function index($user)
    {
      //
    }    
    public function authenticate(Request $request)
    {
       
        $credentials = $request->only('username','email', 'password');
        
        try {
         Config::set('jwt.user', 'App\Customer'); 
		  Config::set('auth.providers.users.model', \App\Customer::class);
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
    
    public function getProfile(Request $request) 
    {
        $credentials = $request->only('username','token');
       $customer=$credentials['username'];
        $customer = Customer::where('username',$customer)->get();
          return response()->json($customer);
    }
}
