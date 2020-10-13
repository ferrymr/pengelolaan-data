<?php

Auth::routes();

// =============================== FRONTEND ===============================

// Homepage
Route::get('/', 'IndexController@index')->name('home');

// Faqs
Route::get('/faqs', function () {
    return view('frontend.faqs');
});

// Privacy policy
Route::get('/return-policy', function () {
    return view('frontend.return-policy');
});

// Detail product
Route::resource('products', 'ProductController')->except(['show']);
Route::livewire('/products/{productCode}', 'product-detail')->name('products.show');

// List product by category
Route::get('/products/category/{category}', 'ProductController@category')->name('products.category');

// Cart
Route::livewire('/mycart', 'my-cart')->name('mycart');

Route::group(['middleware' => 'auth'], function () {

    // Checkout
    Route::livewire('/transaction/checkout', 'checkout')->name('checkout');
    
    // Add address
    Route::get('checkout/new-address', 'AddressController@newAddressPostCart')->name('address.new-address-post-cart');
    Route::get('checkout/select-address', 'AddressController@selectAddressPostCart')->name('address.select-address-post-cart');
    Route::post('checkout/save-address-post-cart', 'AddressController@storePostCart')->name('address.save-address-post-cart');
    Route::get('checkout/set-default-post-cart/{addressId}', 'AddressController@setDefaultPostCart')->name('address.set-default-post-cart');

    Route::resource('profile', 'ProfileController');
    Route::get('address/set-default/{addressId}', 'AddressController@setDefault')->name('address.setdefault');
    Route::resource('address', 'AddressController');    
    
    Route::get('/order-history/{status?}', 'HistoryOrderController@index')->name('order-history-status');
    // Route::get('/order-history/{transactionId}/detail', 'HistoryOrderController@detail')->name('order-history.detail');
    Route::livewire('/order-history/{transactionId}/detail', 'order-detail')->name('order-history.detail');

    Route::get('/transaction', 'TransactionController@store');
    Route::get('/transaction/delete', 'TransactionController@destroy');
    // Route::get('/transaction/checkout', 'TransactionController@checkout')->name('checkout');
    Route::get('/transaction/set-status/{transactionId}/{status}', 'TransactionController@changeStatus')->name('transaction.change-status');
});

Route::get('/spb/check', 'SpbController@check');

Route::get('shoppingcart', 'ShoppingCartController@index')->name('shoppingcart.index');
Route::get('shoppingcart/delete/{id}', 'ShoppingCartController@destroy')->name('shoppingcart.destroy');

// authentication google

Route::get('/google', function () {
    return view('frontend.googleLogin');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

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
    Route::get('index', 'PenjualanController@index')->name('index');
    Route::get('', 'PenjualanController@getNama')->name('get.nama');
    Route::get('datatable', 'PenjualanController@datatable')->name('datatable');
    Route::get('add', 'PenjualanController@create')->name('add');
    Route::post('add', 'PenjualanController@create')->name('add');
    Route::post('store', 'PenjualanController@store')->name('store');
    Route::post('create_invoice', 'PenjualanController@create_invoice')->name('create.invoice');
    Route::post('create_kode', 'PenjualanController@create_kode')->name('create.kode');
    Route::POST('update_penjualan', 'PenjualanController@update_penjualan')->name('update_penjualan');
});