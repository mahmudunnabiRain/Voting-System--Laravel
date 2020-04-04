<?php

use Illuminate\Support\Facades\Route;
use app\Admin;

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


Route::post('/login_submit', 'AdminController@loginSubmit');
Route::get('/login_submit', function(){
    return redirect('/');
});

Route::get('/logout','AdminController@logout');

Route::post('/create_admin_submit', 'AdminController@createAdmin')->middleware('check_auth', 'check_super');
Route::get('/create_admin_submit', function(){
    return redirect('/');
});

Route::get('/manage_admin', function(){
    $admins = Admin::all();
    return view('manage_admin', ['admins' => $admins]);
})->middleware('check_auth', 'check_super');

Route::get('/manage_admin/delete/{id}', 'AdminController@deleteAdmin')->middleware('check_auth', 'check_super');

Route::get('/manage_admin/edit/{id}', 'AdminController@editAdmin')->middleware('check_auth', 'check_super');

Route::post('/edit_admin_submit', 'AdminController@editAdminSubmit')->middleware('check_auth', 'check_super');
Route::get('/edit_admin_submit', function(){
    return redirect('/');
});

Route::get('/admin_home', function(){
    return view('admin_home');
})->middleware('check_auth');

Route::get('/create_admin', function(){
    return view('create_admin');
})->middleware('check_auth', 'check_super');

Route::get('/create_poll', function(){
    return view('create_poll');
})->middleware('check_auth', 'check_super');

Route::get('/voter', function(){
    return view('voter');
})->middleware('check_auth', 'check_access_voter');

Route::get('/progress', function(){
    return view('progress');
})->middleware('check_auth');

Route::get('/collect_vote', function(){
    return view('collect_vote');
})->middleware('check_auth', 'check_access_collect_vote');