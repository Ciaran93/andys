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
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/history', 'HomeController@history');

//Admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/items', 'AdminController@items');
Route::get('/admin/about', 'AdminController@about');
Route::get('/admin/foods', 'AdminController@foods');


// POSTS

// About
Route::post('/admin/about', 'AboutController@updateAbout')->name('about.update');

// Items
Route::post('/admin/items', 'ItemController@addItem')->name('items.add');