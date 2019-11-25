<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin',function ()
{
    return view('Admin.index');

});

Route::get('/post/{id}',['as' => 'home.post','uses' => 'AdminPostsController@post']);


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'admin'], function ()
{


    Route::resource('/admin/users', 'AdminUsersController');


    Route::resource('/admin/posts', 'AdminPostsController');

    Route::resource('/admin/categories', 'AdminCategoriesController');


    //for bulk delete
    Route::delete('/delete/media','AdminMediasController@deleteMedia');

    Route::resource('/admin/media', 'AdminMediasController');


    Route::resource('/admin/comments', 'PostCommentsController');

    Route::resource('/admin/comment/replies', 'CommentRepliesController');


});

//middleware for logged user only
Route::group(['middleware' => 'auth'], function ()
{
    Route::post('comment/reply','CommentRepliesController@store');

});

