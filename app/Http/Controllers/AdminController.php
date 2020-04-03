<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Redirect; 
use Session;


class AdminController extends Controller
{
    //
    function createAdmin(Request $req)
    {
        $adminEntry = new Admin();

        $adminEntry->name = $req->name;
        $adminEntry->email = $req->email;
        $adminEntry->type = $req->type;
        if($req->type == 'super')
        {
            $adminEntry->access_voter = 1;
            $adminEntry->access_collect_vote = 1;
        }
        else
        {
            if($req->has('access_voter'))
            {
                $adminEntry->access_voter = 1;
            }
            else
            {
                $adminEntry->access_voter = 0;
            }
            if($req->has('access_collect_vote'))
            {
                $adminEntry->access_collect_vote = 1;
            }
            else
            {
                $adminEntry->access_collect_vote = 0;
            }
        }
        $adminEntry->password = $req->pwd;

        $adminEntry->save();
        return redirect('create_admin')->with('message','New admin created');
        
    }

    function loginSubmit(Request $req)
    {
        $adminData = Admin::where('email','=',$req->email)->first();
        if(!$adminData)
        {
            return redirect('/')->withErrors(['Email is not authorized !', 'The Message']);
        }
    
        if($adminData->password == $req->pwd)
        {
            Session::put('adminData', $adminData);
            return redirect('admin_home');
        }
        else
        {
            return redirect('/')->withErrors(['Wrong password !', 'The Message']);
        }
        
        
    }

    function logout()
    {
        Session::forget('adminData');
        return redirect('/');
    }
}
