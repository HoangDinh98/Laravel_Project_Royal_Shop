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



// My Routes
Route::resource('admin/categories', "Admin\AdminCategoriesController", array('as' => 'admin'));
Auth::routes();

Route::resource('admin/providers', "Admin\AdminProvidersController", array('as' => 'admin'));
Auth::routes();

Route::resource('admin/promotions', "Admin\AdminPromotionsController", array('as' => 'admin'));
Auth::routes();

Route::resource('admin/products', "Admin\AdminProductsController", array('as' => 'admin'));
Auth::routes();

Route::resource('admin/roles', "Admin\AdminRolesController", array('as' => 'admin'));
Auth::routes();

Route::resource('admin/users', "Admin\AdminUsersController", array('as' => 'admin'));
Auth::routes();

Route::resource('admin/orders', "Admin\AdminOrdersController", array('as' => 'admin'));
Auth::routes();

Route::resource('admin/orders', "Admin\AdminCommentsController", array('as' => 'admin'));
Auth::routes();

Route::resource('admin/media', "Admin\AdminMediaController", array('as' => 'admin'));
Auth::routes();

Route::resource("ui/home", "UI\UIHomeController", array('as' => 'ui'));
Auth::routes();

Route::get("ui/home/category/{id}", "UI\UIHomeController@getProByCate")->name('ui.home.getProByCate');

Route::get('admin/products/{id}/provider',[ 'uses'=>'Admin\AdminProductsController@getProviderById'] );
Route::get('admin/media/{id}/product',[ 'uses'=>'Admin\AdminMediaController@getProductById'] );


//------ Cart ------
Route::post("ui/addcart", "UI\UICartController@addCart")->name('ui.addcart');
Route::post("ui/cart/plus", "UI\UICartController@plusCart")->name('ui.cart.plus');
Route::post("ui/cart/minus", "UI\UICartController@minusCart")->name('ui.cart.minus');
Route::post("ui/cart/remove", "UI\UICartController@removeItem")->name('ui.cart.remove');
Route::get("ui/cart", "UI\UICartController@show")->name("ui.cart");
Route::get("ui/checkout", "UI\UICartController@checkout")->name("ui.checkout");
Route::post("ui/checkout", "UI\UICartController@checkoutSubmit")->name("ui.checkout");

Route::post("ui/home/search", "UI\UIHomeController@search")->name('ui.home.search');