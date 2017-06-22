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

// Route::get('/', 'HomeController@index');
// Route::get('/site', 'HomeController@willBeindex');
Route::get('/', 'HomeController@willBeindex');
Route::get('/about', 'HomeController@about');
Route::get('/history', 'HomeController@history');

//Admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/items', 'AdminController@items');
Route::get('/admin/about', 'AdminController@about');
Route::get('/admin/foods', 'AdminController@foods');
Route::get('/admin/delete/{id}', 'ItemController@delete')->name('items.delete');
Route::get('/admin/editItem/{id}','AdminController@editItem');

// POSTS

// About
Route::post('/admin/about', 'AboutController@updateAbout')->name('about.update');

// Items
Route::post('/admin/items', 'ItemController@addItem')->name('items.add');
Route::post('/admin/', 'ItemController@update')->name('items.update');

//Upload
Route::post('/upload', 'UploadController@upload')->name('upload');
Route::get('/admin/media', 'MediaController@index');
