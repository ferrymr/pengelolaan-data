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

Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile', 'ProfileController');
    Route::get('address/set-default/{addressId}', 'AddressController@setDefault')->name('address.setdefault');
    Route::resource('address', 'AddressController');
    Route::livewire('/transaction/checkout', 'checkout')->name('checkout');

    Route::resource('order-history', 'HistoryOrderController');
    Route::get('/orderlist', 'HistoryOrderController@orderlist')->name('history-order.orderlist');
    Route::get('/detailhistory', 'HistoryOrderController@detailhistory')->name('history-order.detailhistory');


    Route::get('/transaction', 'TransactionController@store');
    Route::get('/transaction/delete', 'TransactionController@destroy');
    // Route::get('/transaction/checkout', 'TransactionController@checkout')->name('checkout');
    Route::get('/transaction/set-status/{transactionId}/{status}', 'TransactionController@changeStatus');
});

Route::get('/', 'IndexController@index')->name('home');


Route::livewire('/products/{productCode}', 'product-detail')->name('products.show');
Route::get('/products/category/{category}', 'ProductController@category')->name('products.category');
Route::resource('products', 'ProductController')->except(['show']);

Route::livewire('/mycart', 'my-cart')->name('mycart');



Route::get('/spb/check', 'SpbController@check');

// Route::resource('shoppingcarts', 'ShoppingCartController');
// Route::get('/history-transaction', function () {
//     return view('history-transaction');
// });
// Route::get('/detail-history-transaction', function () {
//     return view('detail-history-transaction');
// });
// Route::get('/history-transaction-order-list', function () {
//     return view('history-transaction-order-list');
// });

// Route::get('/address-list', function () {
//     return view('address-list');
// });
// Route::get('/address-form', function () {
//     return view('address-form');
// });
/* Route::get('/checkout', function () {
    return view('checkout');
}); */

Route::get('/faqs', function () {
    return view('faqs');
});

Route::get('/return-policy', function () {
    return view('return-policy');
});

Route::get('shoppingcart', 'ShoppingCartController@index')->name('shoppingcart.index');
Route::get('shoppingcart/delete/{id}', 'ShoppingCartController@destroy')->name('shoppingcart.destroy');


Route::get('/google', function () {
    return view('googleLogin');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('test', 'TestController@index');

Auth::routes();
