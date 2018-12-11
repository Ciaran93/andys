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
Route::get('/gin', 'HomeController@showGin');
Route::get('/beef', 'HomeController@showBeef');

Route::post('/gift/charge', 'GiftController@charge');
Route::get('/gift/thanks', 'GiftController@showGiftVoucher');

//Admin
Route::get('/admin', 'AdminController@index');

// ADMIN :: - Menu
Route::get('/admin/menu/items', 'AdminController@menuItems');
Route::get('/admin/menu/sections', 'AdminController@menuSections');
Route::get('/admin/foods', 'AdminController@foods');
Route::get('/admin/about', 'AdminController@about');

// ADMIN :: About
Route::post('/admin/about', 'AboutController@updateAbout')->name('about.update');

// ADMIN :: Items
Route::post('/admin/items', 'ItemController@addItem')->name('items.add');
Route::post('/admin/', 'ItemController@update')->name('items.update');
Route::get('/admin/delete/{id}', 'ItemController@delete')->name('items.delete');
Route::get('/admin/editItem/{id}','AdminController@editItem');


// ADMIN :: SECTIONS
Route::post('/admin/menu/sections', 'MenuSectionController@create')->name('sections.add');
Route::get('/admin/menu/section/delete/{id}', 'MenuSectionController@delete')->name('section.delete');
Route::post('/admin/menu/section/', 'MenuSectionController@update')->name('section.update');
Route::get('/admin/menu/section/edit/{id}','AdminController@editSection');

// ADMIN :: CATEGORIES
Route::get('/admin/menu/sections/categories/{menu_section_id}', 'MenuCategoryController@index');
Route::post('/admin/menu/sections/categories/add', 'MenuCategoryController@addCategory')->name('category.add');
Route::get('/admin/menu/section/{menu_section_id}/categories/delete/{id}', 'MenuCategoryController@delete');
Route::post('/admin/menu/section/', 'MenuSectionController@update')->name('section.update');

// ADMIN :: SHOW SECTIONS
Route::get('/admin/show-sections', 'ShowSectionsController@index');
Route::post('/admin/show-sections/update', 'ShowSectionsController@update')->name('showSections.update');


// ADMIN :: RESERVATION
Route::get('/admin/reservations', 'ReservationController@index');
Route::get('/admin/reservations/export', 'ReservationController@exportReservations');

// ADMIN :: GIFT VOUCHERS
Route::get('/admin/giftvouchers/', 'GiftController@admin');
Route::get('/admin/giftvouchers/redeemVoucher/{id}', 'GiftController@redeemVoucher');


// AJAX
Route::get('/admin/ajax/getMenuCategories/{id}','MenuCategoryController@getMenuCategoriesAjax');


Route::post('/admin/ajax/addReservation','ReservationController@addReservation');

Route::post('/admin/ajax/redeemAjax','GiftController@redeemAjax');


