<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
class PagesController extends Controller
{
     
     public function index() 
        {
            return view('pages.home');    
        }
    
      public function adminlist(Request $request)
        {
            if($request->ajax())
            {
                $users = User::all(); 
                $v = view('admin.list')->with('users',$users);
                return response($v);
            }
        }
    
     public function createadmin(Request $request) // return view of register blade to create admin
        {
             if($request->ajax())
            {
                return response()->view('admin.create');
            }
        }
    
    public function customerList(Request $request)
    {
        if($request->ajax())
        {
            $customer = Customer::all();
            $v = view('pages.customerlist')->with('customers',$customer);
            return response($v);
        }
    }
}
