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
Route::get('/', 'HomeController@index')->middleware('Language');
Route::get('/front', 'HomeController@index');
Route::post('/search', 'HomeController@search');
Route::get('/shop', 'HomeController@shop');
Route::get('/products/{name}', 'HomeController@proCat');
Route::get('language/{lang}',function($lang){
  \Session::put('locale',$lang);
  return back();
})->middleware('Language');
Route::get('/front/product_details/{id}', 'HomeController@product_details');
Route::get('/cart', 'CartController@index');
Route::get('/cart/additem/{id}', 'CartController@additem');
Route::get('/cart/delete/{id}', 'CartController@destroy');
Route::post('/cart/updatecart/{id}', 'CartController@updatecart');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/checkout', 'CheckoutController');
    Route::post('front/formvalidate', 'CheckoutController@formvalidate');
    Route::resource('/profile', 'ProfileController');
    Route::get('/thankyou', 'ProfileController@thankyou');
    Route::get('/orders', 'ProfileController@orders');

    Route::get('/address', 'ProfileController@address');
    Route::post('/address', 'ProfileController@UpdateAddress');

    Route::get('/UpdatePassword', 'ProfileController@password');
    Route::post('/UpdatePassword', 'ProfileController@UpdatePassword');
});
Auth::routes();
Route::group(['middleware' => 'Admin'], function() {
    Route::resource('/admin', 'AdminController');
    Route::resource('/product', 'ProductController');
    Route::get('/product/delete/{id}', 'ProductController@destroy');
    Route::get('/product/show/{id}', 'ProductController@show');

    Route::resource('/category', 'Pro_catController');
    Route::get('/category/delete/{id}', 'Pro_catController@destroy');
});
