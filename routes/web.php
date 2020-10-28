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

    // Checkout - choose shipment method
    Route::livewire('/transaction/checkout', 'checkout')->name('checkout');

    // Checkout - choose payment method
    Route::livewire('/transaction/checkout-payment', 'checkout-payment')->name('checkout-payment');

    // Add address
    Route::get('checkout/new-address', 'AddressController@newAddressPostCart')->name('address.new-address-post-cart');
    Route::get('checkout/select-address', 'AddressController@selectAddressPostCart')->name('address.select-address-post-cart');
    Route::post('checkout/save-address-post-cart', 'AddressController@storePostCart')->name('address.save-address-post-cart');
    Route::get('checkout/set-default-post-cart/{addressId}', 'AddressController@setDefaultPostCart')->name('address.set-default-post-cart');

    Route::resource('profile', 'ProfileController');
    Route::get('address/set-default/{addressId}', 'AddressController@setDefault')->name('address.setdefault');
    Route::resource('address', 'AddressController');

    // Daftar jadi member
    Route::get('member/signup', 'MemberController@signup')->name('member.signup');

    Route::get('/order-history/{status?}', 'HistoryOrderController@index')->name('order-history-status');
    Route::livewire('/order-history/{transactionId}/detail', 'order-detail')->name('order-history.detail');

    Route::get('/transaction', 'TransactionController@store');
    Route::get('/transaction/delete', 'TransactionController@destroy');
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
Route::group(['prefix' => '/admin/dashboard/', 'as' => 'admin.dashboard.'], function () {
    Route::get('', 'DashboardController@index')->name('index');
});

// Master Barang
Route::group(['prefix' => '/admin/barang/', 'as' => 'admin.barang.'], function()
{
    Route::get('', 'BarangController@index')->name('index');
    Route::get('datatable', 'BarangController@datatable')->name('datatable');
    Route::get('edit/{kode_barang}', 'BarangController@edit')->name('edit');
    Route::get('delete/{kode_barang}', 'BarangController@destroy')->name('delete');
    Route::get('add', 'BarangController@create')->name('add');
    Route::post('store', 'BarangController@store')->name('store');
    Route::post('update/{kode_barang}', 'BarangController@update')->name('update');

    Route::post('store-image', 'BarangController@storeBarangImage')->name('store-image');
    Route::get('delete-barang-image/{barangId?}/{id?}', 'BarangController@deleteBarangImage')->name('detele-barang-image');
});

Route::group(['prefix' => '/admin/barang/', 'as' => 'admin.barang.'], function()
{
    Route::get('barang-image/{id?}', 'BarangController@getBarangImage')->name('barang-image');

});

// Master Supplier
Route::group(['prefix' => '/admin/supplier/', 'as' => 'admin.supplier.'], function()
{
    Route::get('', 'SupplierController@index')->name('index');
    Route::get('add', 'SupplierController@create')->name('add');
    Route::post('store', 'SupplierController@store')->name('store');
    Route::get('datatable', 'SupplierController@datatable')->name('datatable');
    Route::get('edit/{kode_supp}', 'SupplierController@edit')->name('edit');
    Route::get('delete/{kode_supp}', 'SupplierController@destroy')->name('delete');
    Route::post('update/{kode_supp}', 'SupplierController@update')->name('update');
});

// Slider
Route::group([
    // 'middleware' => ['permission:access-slider'], 
    'prefix' => '/admin/slider/',
    'as' => 'admin.slider.'
], function () {
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
], function () {
    Route::get('', 'UserController@index')->name('index');
    Route::get('datatable', 'UserController@datatable')->name('datatable');
    Route::get('edit/{id}', 'UserController@edit')->name('edit');
    Route::get('view/{id}', 'UserController@view')->name('view');
    Route::get('delete/{id}', 'UserController@destroy')->name('delete');
    Route::get('add', 'UserController@create')->name('add');
    Route::post('store', 'UserController@store')->name('store');
    Route::post('update/{id}', 'UserController@update')->name('update');
});

// Series
Route::group([
    // 'middleware' => ['permission:access-user'], 
    'prefix' => '/admin/series/', 
    'as' => 'admin.series.'
], function(){
    Route::get('', 'SeriesController@index')->name('index');
    Route::get('datatable', 'SeriesController@datatable')->name('datatable');
    Route::get('edit/{kode_pack}', 'SeriesController@edit')->name('edit');
    Route::get('view/{kode_pack}', 'SeriesController@view')->name('view');
    Route::get('delete/{kode_pack}', 'SeriesController@destroy')->name('delete');
    Route::get('add', 'SeriesController@create')->name('add');
    Route::post('store', 'SeriesController@store')->name('store');
    Route::post('update/{kode_pack}', 'SeriesController@update')->name('update');
});

// Penjualan
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

// Konfirmasi penjualan
Route::group([
    'prefix' => '/admin/konfirmasi-penjualan/',
    'as'     => 'admin.konfirmasi-penjualan.'
], function () {
    Route::get('/', 'KonfirmasiPenjualanController@index')->name('index');
    Route::get('/datatable', 'KonfirmasiPenjualanController@datatable')->name('datatable');
    // Route::get('/edit/{id}', 'KonfirmasiPenjualanController@edit')->name('edit');
    // Route::post('/update/{id}', 'KonfirmasiPenjualanController@update')->name('update');
    // Route::get('/view/{id}', 'KonfirmasiPenjualanController@view')->name('view');
    // Route::get('/delete/{id}', 'KonfirmasiPenjualanController@destroy')->name('delete');
    // Route::get('/add', 'KonfirmasiPenjualanController@create')->name('add');
    // Route::post('/store', 'KonfirmasiPenjualanController@store')->name('store');
});
