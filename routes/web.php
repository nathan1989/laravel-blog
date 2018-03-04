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

// homepage
Route::get('/', function () {
    return view('home');
});

// redirect default home
Route::get('/home', 'HomeController@index')->name('home');

// blog views
Route::get('blog', 'BlogController@allBlogPosts');
Route::get('blog/{slug}', 'BlogController@singleBlogPost');

// in built authorisation
Auth::routes();

// admin views
Route::group(['middleware' => 'auth'], function() {
    Route::resource('/admin', 'AdminController');
});