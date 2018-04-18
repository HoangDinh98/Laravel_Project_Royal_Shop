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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', "UI\UIHomeController@index");

Route::get('/home', 'HomeController@index')->name('home');



// My Routes
Route::resource('admin/categories', "Admin\AdminCategoriesController", array('as' => 'admin'));

Route::resource('admin/providers', "Admin\AdminProvidersController", array('as' => 'admin'));

Route::resource('admin/promotions', "Admin\AdminPromotionsController", array('as' => 'admin'));

Route::resource('admin/products', "Admin\AdminProductsController", array('as' => 'admin'));

Route::resource('admin/roles', "Admin\AdminRolesController", array('as' => 'admin'));

Route::resource('admin/users', "Admin\AdminUsersController", array('as' => 'admin'));

//------ Admin Orders ------
Route::resource('admin/orders', "Admin\AdminOrdersController", array('as' => 'admin'));
Route::post("admin/orders/updateindex", "Admin\AdminOrdersController@updateAjax")->name('admin.orders.updateindex');

Route::resource('admin/comments', "Admin\AdminCommentsController", array('as' => 'admin'));
Route::post("admin/comments/update", "Admin\AdminCommentsController@updateAjax")->name('admin.comments.update');

Route::resource('admin/media', "Admin\AdminMediaController", array('as' => 'admin'));

Route::resource("/home", "UI\UIHomeController");

Route::get("/product/{id}", "UI\UIProductDetailController@index")->name('product.index');
Route::post("/product/{id}/comment", "UI\UIProductDetailController@addComment")->name('product.addcomment');
Route::get('/product/{id}/delete', 'UI\UIProductDetailController@deleteComment')->name('product.deletecomment');

Route::get("/home/category/{id}", "UI\UIHomeController@getProByCate")->name('home.getProByCate');
Route::get("/home/searchbyprice/{data}", "UI\UIHomeController@getProByPrice")->name('home.getProByPrice');

Route::get('admin/products/{id}/provider',[ 'uses'=>'Admin\AdminProductsController@getProviderById'] );
Route::get('admin/media/{id}/product',[ 'uses'=>'Admin\AdminMediaController@getProductById'] );

//--- UI ----
Route::post("user/login", "UI\UIUserController@login")->name('user.login');
//Route::post("user/logout", "UI\UIUserController@login")->name('user.logout');

Route::get('user/register', 'UI\UIUserController@registerShow')->name('user.register');
Route::post('user/register', 'UI\UIUserController@Register')->name('user.register.submit');
Route::get('user/verifyemail/{confirm_code}', 'UI\UIUserController@verifyEmail')->name('user.verifyemail');

// ----------- ACCOUNT ----------------
Route::get('user/account/{id}', 'UI\UIAccountController@show')->name('user.account');
Route::get('user/order/{id}', 'UI\UIAccountController@orderDetail')->name('user.orderdetail');
Route::get('user/profile/{id}', 'UI\UIAccountController@profile')->name('user.profile');
Route::post('user/profile/{id}', 'UI\UIAccountController@profileUpdate')->name('user.profile.update');
Route::post('user/order/canceled', 'UI\UIAccountController@orderCanceled')->name('user.ordercanceled');
Route::put('user/profile/changepass', 'UI\UIAccountController@changePass')->name('user.changepass');
Route::get('user/profile/requestmail/{id}', 'UI\UIAccountController@sendMail')->name('user.sendmail');

//------ Cart ------
Route::post("cart/addcart", "UI\UICartController@addCart")->name('cart.addcart');
Route::post("cart/plus", "UI\UICartController@plusCart")->name('cart.plus');
Route::post("cart/minus", "UI\UICartController@minusCart")->name('cart.minus');
Route::post("cart/remove", "UI\UICartController@removeItem")->name('cart.remove');
Route::get("cart", "UI\UICartController@show")->name("cart");
Route::get("checkout", "UI\UICartController@checkout")->name("checkout");
Route::post("checkout", "UI\UICartController@checkoutSubmit")->name("checkout");
Route::get("shipping", "UI\UICartController@shipping")->name("shipping");
Route::post("shippingAgree", "UI\UICartController@shippingSubmit")->name("shippingAgree");



//Route::get("/search","UI\UIHomeController@search")->name('home.search');
Route::get("/search","UI\UIHomeController@search")->name('home.search');
Route::get("/home/searchbyprice/{data}", "UI\UIHomeController@getProByPrice")->name('home.getProByPrice');


//Make auth for routes
Auth::routes();