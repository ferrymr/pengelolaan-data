<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index')->name('home');

Route::livewire('/products/{productCode}', 'product-detail')->name('products.show');
Route::get('/products/category/{category}', 'ProductController@category')->name('products.category');
Route::resource('products', 'ProductController')->except(['show']);

Route::livewire('/mycart', 'my-cart')->name('mycart');


Route::get('/transaction', 'TransactionController@store');
Route::get('/transaction/delete', 'TransactionController@destroy');

// Route::resource('shoppingcarts', 'ShoppingCartController');
Route::get('/history-transaction', function () {
    return view('history-transaction');
});
Route::get('/detail-history-transaction', function () {
    return view('detail-history-transaction');
});
Route::get('/history-transaction-order-list', function () {
    return view('history-transaction-order-list');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/edit-profile', function () {
    return view('edit-profile');
});
Route::get('/address-list', function () {
    return view('address-list');
});
Route::get('/address-form', function () {
    return view('address-form');
});
Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('shoppingcart', 'ShoppingCartController@index')->name('shoppingcart.index');
Route::get('shoppingcart/delete/{id}', 'ShoppingCartController@destroy')->name('shoppingcart.destroy');

Route::get('/google', function () {
    return view('googleLogin');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
