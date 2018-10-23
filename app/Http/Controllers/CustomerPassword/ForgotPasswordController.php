<?php

namespace App\Http\Controllers\CustomerPassword;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Config;
class ForgotPasswordController extends Controller
{
   

    use SendsPasswordResetEmails;

    public function __construct()
    {
        Config::set("auth.defaults.passwords","customer");
        $this->middleware('guest');
    }

    function showLinkRequestForm()
    {
        
        return view('customer.passwords.email');
    }
}
 