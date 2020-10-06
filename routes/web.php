<?php

use App\Http\Controllers\barangController;
use Illuminate\Support\Facades\Route;

// =============================== FRONTEND ===============================

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

// Route::get('/', 'IndexController@index')->name('home');

Route::livewire('/products/{productCode}', 'product-detail')->name('products.show');
Route::get('/products/category/{category}', 'ProductController@category')->name('products.category');
Route::resource('products', 'ProductController')->except(['show']);

Route::livewire('/mycart', 'my-cart')->name('mycart');

Route::get('/spb/check', 'SpbController@check');

Route::get('shoppingcart', 'ShoppingCartController@index')->name('shoppingcart.index');
Route::get('shoppingcart/delete/{id}', 'ShoppingCartController@destroy')->name('shoppingcart.destroy');

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

// static page

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/faqs', function () {
    return view('faqs');
});

Route::get('/return-policy', function () {
    return view('return-policy');
});

// authentication google

Route::get('/google', function () {
    return view('googleLogin');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Auth::routes();

// =============================== BACKEND ===============================

// Dashboard
Route::group(['prefix' => '/admin/dashboard/', 'as' => 'admin.dashboard.'], function()
{
    Route::get('', 'DashboardController@index')->name('index');
});

// Master Barang
Route::group(['prefix' => '/admin/barang/', 'as' => 'admin.barang.'], function()
{
    Route::get('', 'barangController@show')->name('index');
});

// Slider
Route::group([
    // 'middleware' => ['permission:access-slider'], 
    'prefix' => '/admin/slider/', 
    'as' => 'admin.slider.'
], function(){
    Route::get('', 'SliderController@index')->name('index');
    Route::get('datatable', 'SliderController@datatable')->name('datatable');
    Route::get('delete/{id}', 'SliderController@destroy')->name('delete');    
    Route::post('store', 'SliderController@store')->name('store');
    Route::get('shortable', 'SliderController@updateOrder')->name('shortable');
});

// User
Route::group([
    // 'middleware' => ['permission:access-user'], 
    'prefix' => '/admin/user/', 
    'as' => 'admin.user.'
], function(){
    Route::get('', 'UserController@index')->name('index');
    Route::get('datatable', 'UserController@datatable')->name('datatable');
    Route::get('edit/{id}', 'UserController@edit')->name('edit');
    Route::get('view/{id}', 'UserController@view')->name('view');
    Route::get('delete/{id}', 'UserController@destroy')->name('delete');
    Route::get('add', 'UserController@create')->name('add');
    Route::post('store', 'UserController@store')->name('store');
    Route::post('update/{id}', 'UserController@update')->name('update');
});


// ORDER
Route::group([
    'prefix' => '/admin/penjualan/',
    'as'     => 'admin.penjualan.'
], function () {
    Route::get('', 'PenjualanController@index')->name('index');
    Route::get('', 'PenjualanController@getNama')->name('get.nama');
    Route::get('datatable', 'PenjualanController@datatable')->name('datatable');
    Route::get('add', 'PenjualanController@create')->name('add');
    Route::post('store', 'PenjualanController@store')->name('store');
});