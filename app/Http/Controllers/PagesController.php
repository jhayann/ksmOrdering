<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
     
    public function index() 
    {
        return view('pages.home');    
    }
    
    public function adminLogin()
    {
        return view('admin.login');
    }
    
    public function adminDashboard()
    {
        return  view('admin.dashboard');
    }
    
}
