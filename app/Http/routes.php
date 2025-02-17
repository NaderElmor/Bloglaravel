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
    return view('welcome');

});


Route::get('/admin',function ()
{
    return view('Admin.index');

});



Route::get('/post/{id}',['as' => 'home.post','uses' => 'AdminPostsController@post']);

Route::auth();

Route::get('/home', 'HomeController@index');




Route::group(['middleware' => 'admin'], function ()
{
    Route::resource('/admin/users', 'AdminUsersController');

    Route::resource('/admin/posts', 'AdminPostsController');

    Route::resource('/admin/categories', 'AdminCategoriesController');

    Route::resource('/admin/media', 'AdminMediasController');


    Route::resource('/admin/comments', 'PostCommentsController');

    Route::resource('/admin/comment/replies', 'CommentRepliesController');


});

//middleware for logged user only
Route::group(['middleware' => 'auth'], function ()
{
    Route::post('comment/reply','CommentRepliesController@store');

});
