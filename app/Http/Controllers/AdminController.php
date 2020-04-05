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
            $adminEntry->access_voter = 'yes';
            $adminEntry->access_collect_vote = 'yes';
        }
        else
        {
            if($req->has('access_voter'))
            {
                $adminEntry->access_voter = 'yes';
            }
            else
            {
                $adminEntry->access_voter = 'no';
            }
            if($req->has('access_collect_vote'))
            {
                $adminEntry->access_collect_vote = 'yes';
            }
            else
            {
                $adminEntry->access_collect_vote = 'no';
            }
        }
        $adminEntry->password = $req->password;

        $adminEntry->save();
        $req->session()->flash('message', 'New admin created.');
        return redirect('create_admin');
        
    }

    function loginSubmit(Request $req)
    {
        $loginValidator = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:8'
        ]);

        $adminData = Admin::where('email',$req->email)->first();
        if(!$adminData)
        {
            return redirect('/')->withErrors(['email' => 'Email is not authorized !'])->withInput();
        }
    
        if($adminData->password == $req->password)
        {
            Session::put('adminData', $adminData);
            return redirect('admin_home');
        }
        else
        {
            return redirect('/')->withErrors(['password' => 'Wrong password !'])->withInput();
        }
        
        
    }

    function logout()
    {
        Session::forget('adminData');
        return redirect('/');
    }

    function editAdmin($id)
    {
        $targetAdmin = Admin::where('id', $id)->first();
        return view('edit_admin', ['targetAdmin' => $targetAdmin]);
    }

    function editAdminSubmit(Request $req)
    {
        $targetAdmin = Admin::find($req->id);
        $targetAdmin->name = $req->name;
        $targetAdmin->email = $req->email;
        $targetAdmin->type = $req->type;
        if($req->type == 'super')
        {
            $targetAdmin->access_voter = 'yes';
            $targetAdmin->access_collect_vote = 'yes';
        }
        else
        {
            if($req->has('access_voter'))
            {
                $targetAdmin->access_voter = 'yes';
            }
            else
            {
                $targetAdmin->access_voter = 'no';
            }
            if($req->has('access_collect_vote'))
            {
                $targetAdmin->access_collect_vote = 'yes';
            }
            else
            {
                $targetAdmin->access_collect_vote = 'no';
            }
        }
        $targetAdmin->password = $req->password ;

        $targetAdmin->save();
        $req->session()->flash('message', 'Admin data updated.');
        return redirect('/manage_admin');
    }

    function deleteAdmin($id, Request $req)
    {
        $targetAdmin = Admin::find($req->id);
        $targetAdmin->delete();
        $req->session()->flash('message', 'Admin data deleted.');
        return redirect('/manage_admin');
    }

}
