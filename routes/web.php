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
Route::get('/blog/{id}', 'BlogController@getBlogPost');

//Admin
Route::get('/admin', 'AdminController@index');

// Admin - Menu
Route::get('/admin/menu/items', 'AdminController@menuItems');
Route::get('/admin/menu/sections', 'AdminController@menuSections');


Route::get('/admin/about', 'AdminController@about');
Route::get('/admin/foods', 'AdminController@foods');
Route::get('/admin/editItem/{id}','AdminController@editItem');
Route::get('/admin/media', 'AdminController@media');

Route::get('/admin/menu/section/edit/{id}','AdminController@editSection');

// About
Route::post('/admin/about', 'AboutController@updateAbout')->name('about.update');

// Items
Route::post('/admin/items', 'ItemController@addItem')->name('items.add');
Route::post('/admin/', 'ItemController@update')->name('items.update');
Route::get('/admin/delete/{id}', 'ItemController@delete')->name('items.delete');

//Sections
Route::post('/admin/menu/sections', 'MenuSectionController@create')->name('sections.add');
Route::get('/admin/menu/section/delete/{id}', 'MenuSectionController@delete')->name('section.delete');
Route::post('/admin/menu/section/', 'MenuSectionController@update')->name('section.update');


//Categories
Route::get('/admin/menu/sections/categories/{menu_section_id}', 'MenuCategoryController@index');
Route::post('/admin/menu/sections/categories/add', 'MenuCategoryController@addCategory')->name('category.add');
Route::get('/admin/menu/section/{menu_section_id}/categories/delete/{id}', 'MenuCategoryController@delete');
Route::post('/admin/menu/section/', 'MenuSectionController@update')->name('section.update');
// /admin/menu/section/{{$section->id}}/categories/delete/{{$category->id}}
//Media
Route::post('/admin/media', 'MediaController@upload')->name('upload');

//Blog
Route::get('/admin/blog/{id}','BlogController@edit');
Route::get('/admin/blog','BlogController@index');
Route::post('/admin/blog','BlogController@add')->name('blog.update');

//Social

//Bookings
Route::get('/bookings','BookingsController@reply');

// Reservation
Route::post('/ajax/email','ReservationController@email')->name('reservation.email');


// AJAX
Route::get('/admin/ajax/getMenuCategories/{id}','MenuCategoryController@getMenuCategoriesAjax');

