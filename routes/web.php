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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bnsp', function(){
  return 'welcome to bnsp';
});

Route::group(['middleware' => 'auth'], function(){
    Route::resource('adminblog', 'BlogController');
    Route::get('/admin/add_blog', 'BlogController@add_blog');
    Route::get('/admin/edit_blog/{id}', 'BlogController@edit_blog');
});

Route::get('/blog', 'BlogController@index');
Route::get('/create-blog', 'BlogController@create');
