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

// --------------------- FRONT END ------------------------------------
Route::get('/', 'FrontController@index')->name('homefront');
Route::get('/shirts', 'FrontController@shirts')->name('shirts');
Route::get('/shirt', 'FrontController@shirt')->name('shirt');
Auth::routes();

// --------------------- ACCOUNT ------------------------------------
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');

// --------------------- CART ------------------------------------
Route::resource('/cart', 'CartController');
Route::get('/cart/add-items/{id}', 'CartController@addItem')->name('cart.addItem');

// --------------------- ADMIN ------------------------------------
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::resource('/product', 'ProductsController');
    Route::resource('/category', 'CategoriesController');
});

// --------------------- CHECKOUT ------------------------------------
Route::get('checkout', 'CheckoutController@step1')->name('checkout.step1');
Route::get('shipping-info', 'CheckoutController@shipping')->name('checkout.shipping');
Route::get('payment', 'CheckoutController@payment')->name('checkout.payment');
Route::post('store-payment', 'CheckoutController@storePayment')->name('payment.store');

// --------------------- ADDRESS ------------------------------------
Route::resource('/address', 'AddressController');