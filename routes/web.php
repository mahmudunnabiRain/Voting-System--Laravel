<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $adminData=Session::get('adminData');
    if($adminData){
        return redirect('admin_home');
    }
    else
    {
        return view('login');
    }

});

Route::post('loginSubmit', 'Login@loginSubmit');


Route::get('admin_home', function(){
    $adminData=Session::get('adminData');
    if($adminData){
        return view('admin_home');
    }
    else
    {
        return redirect('/');
    }
});

Route::get('logOut','Login@logOut');

Route::get('co_admin', function(){
    $adminData=Session::get('adminData');
    if($adminData){
        return view('co_admin');
    }
    else
    {
        return redirect('/');
    }
});


