<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Notification;
use App\Product;
use App\Orders;
use DB;
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
    
    public function pendingOrders()
    {
        $notifications =  Notification::all();
        $order = Orders::where('status',0)->get();
        return view('pages.pending',compact('order'))->with('notifications',$notifications);
    }
    
    public function poolorder(Request $request)
    {
        if($request->ajax())
        {
        $order = Orders::where('status',0)->get();
        $data =  view('pages.ajaxpending',compact('order'));
        return response($data);
        }
        
    }
    public function viewCurrentOrder($id)
    {
               $mycart = DB::table('products')
            ->join('carts', 'products.id','=','carts.product_id')
            ->select('products.name', 'products.amount','carts.*')->get();
        
        $notifications =  Notification::all();
        $order = DB::table('customers')
            ->join('orders','customers.email','=','orders.userid')
            ->select('customers.firstname',
                    'customers.middlename',
                    'customers.lastname',
                    'customers.address',
                    'customers.number',
                    'orders.*')
            ->where('orders.id', $id)->get();
        
        return view('pages.vieworder',compact('order'))->with('notifications',$notifications);
    }
    
    public function viewAllOrder()
    {
        $notifications =  Notification::all();
        $order = Orders::where('status',2)->get();
        return view('pages.orderhistory',compact('order'))->with('notifications',$notifications);
    }
    
    public function completeorder(Request $request)
    {
        Orders::where('id',$request->orderid)
            ->update(['status'=>2]);
        
        return redirect()->route('orderhistory');
    }
}
