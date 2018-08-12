<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
}
