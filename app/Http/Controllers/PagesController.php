<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Notification;
use App\Product;
class PagesController extends Controller
{
     
     public function index() 
        {
         $products = Product::where('active',1)->get();
            return view('pages.home')->with('products',$products);    
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
     public function productlist(Request $request)
        {
            if($request->ajax())
            {
                $products= Product::all(); 
                $v = view('pages.listproduct')->with('products',$products);
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
    
    public function createProduct()
    {
     $notifications =  Notification::all();
       $success = "";
        return view('pages.addproduct',compact('success'))->with('notifications',$notifications);
    }
}
