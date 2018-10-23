<?php

namespace App\Http\Controllers\CustomerPassword;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Config;
class ResetPasswordController extends Controller
{
    //



    use ResetsPasswords;


        /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/customer/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Config::set("auth.defaults.passwords","customer");
        $this->middleware('guest');
    }

    public function showResetForm($token = null)
    {
        
        return view('customer.passwords.reset')->with('token',$token);
    }
}
 