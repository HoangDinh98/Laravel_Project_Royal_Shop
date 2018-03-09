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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// My Routes
Route::resource('admin/categories', "Admin\AdminCategoriesController", array('as' => 'admin'));

Route::resource('admin/providers', "Admin\AdminProvidersController", array('as' => 'admin'));

Route::resource('admin/promotions', "Admin\AdminPromotionsController", array('as' => 'admin'));

Route::resource('admin/products', "AdminProductsController", array('as' => 'admin'));

Route::resource('admin/roles', "Admin\AdminRolesController", array('as' => 'admin'));

Route::resource('admin/users', "Admin\AdminUsersController", array('as' => 'admin'));

Route::resource('admin/orders', "Admin\AdminOrdersController", array('as' => 'admin'));

Route::resource('admin/orders', "Admin\AdminCommentsController", array('as' => 'admin'));

Route::resource('admin/media', "Admin\AdminMediaController", array('as' => 'admin'));
