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
    
    Route::get('checkout/new-address', 'AddressController@newAddressPostCart')->name('address.new-address-post-cart');
    Route::get('checkout/select-address', 'AddressController@selectAddressPostCart')->name('address.select-address-post-cart');
    Route::post('checkout/save-address-post-cart', 'AddressController@storePostCart')->name('address.save-address-post-cart');
    Route::get('checkout/set-default-post-cart/{addressId}', 'AddressController@setDefaultPostCart')->name('address.set-default-post-cart');
    
    Route::get('order-history/waiting-for-payment', 'HistoryOrderController@waitingForPayment')->name('order-history.waiting-for-payment');
    Route::resource('order-history', 'HistoryOrderController');
    Route::get('/orderlist', 'HistoryOrderController@orderlist')->name('history-order.orderlist');
    // Route::get('/order-history/{transactionId}/detail', 'HistoryOrderController@detail')->name('order-history.detail');
    Route::livewire('/order-history/{transactionId}/detail', 'order-detail')->name('order-history.detail');


    Route::get('/transaction', 'TransactionController@store');
    Route::get('/transaction/delete', 'TransactionController@destroy');
    // Route::get('/transaction/checkout', 'TransactionController@checkout')->name('checkout');
    Route::get('/transaction/set-status/{transactionId}/{status}', 'TransactionController@changeStatus')->name('transaction.change-status');
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

Route::get('shoppingcart', 'ShoppingCartController@index')->name('shoppingcart.index');
Route::get('shoppingcart/delete/{id}', 'ShoppingCartController@destroy')->name('shoppingcart.destroy');

Route::get('/google', function () {
    return view('googleLogin');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('test', 'TestController@index');

Auth::routes();
