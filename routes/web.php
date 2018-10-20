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

// Route::get('/hello', function () {
//     return "<h1>Hello World</h1>";
// });
// Route::get('/hello/print', function () {
//     return "Hello World";
// });
// create dynamic routing as users
// Route::get('/users/{id}/{name}', function($id, $name) {
//     return "<h2> This is users . $id . and name is .$name</h2>";
// });

Route::get('/', 'PagesController@index');

// adding a page route
Route::get('/about', 'PagesController@about');

// adding Services page using controller

Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

// Route::get('/admin', function() {
//   return view('layouts.master');
// });

Route::prefix('sitemaster')->group(function()
{
  Route::get('/', 'Master\LoginController@showLoginForm');
  Route::get('/dashboard', 'Master\MasterController@dashboard')->name('admin.dashboard');
  Route::post('/login', 'Master\LoginController@login')->name('admin.login');
});