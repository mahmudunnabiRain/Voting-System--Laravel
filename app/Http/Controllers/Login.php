<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Redirect; 
use Session;

class Login extends Controller
{
    function loginSubmit(Request $req)
    {
        $adminData = Admin::where('email','=',$req->email)->first();
        if(!$adminData)
        {
            return redirect('/')->withErrors(['Email is not authorized!', 'The Message']);;
        }
    
        if($adminData->password == $req->pwd)
        {
            Session::put('adminData', $adminData);
            return redirect('admin_home');
        }
        else
        {
            return redirect('/')->withErrors(['Wrong password!', 'The Message']);;
        }
        
        
    }

    function logOut()
    {
        Session::forget('adminData');
        return redirect('/');
    }







    
}//class ends
