<?php

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
//user Route
Route::group(['namespace'=>'User'],function (){
    Route::get('/','HomeController@index');

    Route::get('post/{post?}','PostController@post')->name('post');
    Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('post/category/{category}','HomeController@category')->name('category');
    //vue routes

    Route::match(['get', 'post'],'/getPosts','PostController@getAllPosts');
    Route::post('/saveLike','PostController@saveLike');
 ///   Route::post('/like','HomeController@postLikePost')->name('like');




});
//Admin Routes
Route::group(['namespace'=>'Admin'],function (){

    // Admin Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login','Auth\LoginController@login');
    Route::get('admin/home','HomeController@index')->name('admin.home');
    Route::resource('admin/user','UserController');

    Route::resource('admin/post','postController');
    Route::resource('admin/tag','tagController');
    Route::resource('admin/category','CategoryController');
    Route::resource('admin/role','roleController');
    Route::resource('admin/permission','PermissionController');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
