<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;

Route::get('/', function () {
    //return view('welcome');
    $user= User::findOrFail(1);

   // echo $user->role['name'];

    echo $user->name;
});


Route::get('/admin',function ()
{
    return view('Admin.index');

});


Route::get('/admin/users',function ()
{
    return view('Admin/users.index');

});


Route::auth();

Route::get('/home', 'HomeController@index');


Route::resource('/admin/users', 'AdminUsersController');
