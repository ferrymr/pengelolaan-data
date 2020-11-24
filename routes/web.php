<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

// =============================== FRONTEND ===============================

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Homepage
Route::get('/', 'IndexController@index')->name('home');

// Cron job
Route::get('/cronjob-update-product', 'IndexController@cronCancelProduct')->name('cronjob-update-product');

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
Route::livewire('/products/detail/{productCode?}/{slug?}', 'product-detail')->name('products.show');

// List product by category
Route::get('/products/category/{category?}/{slug?}', 'ProductController@category')->name('products.category');

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

    // Profile detail
    Route::resource('profile', 'ProfileController');
    Route::get('address/set-default/{addressId}', 'AddressController@setDefault')->name('address.setdefault');
    Route::resource('address', 'AddressController');

    // Daftar jadi member
    Route::get('member/signup', 'MemberController@signup')->name('member.signup');
    Route::post('member/store', 'MemberController@store')->name('member.store');
    Route::post('member/konfirmasi', 'MemberController@konfirmasi')->name('member.konfirmasi');

    // History transaksi di profile
    Route::get('/order-history/{status?}', 'HistoryOrderController@index')->name('order-history-status');
    Route::livewire('/order-history/{transactionId}/detail', 'order-detail')->name('order-history.detail');
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

// Login administrator
Route::get('/login-administrator', function () {
    $user = Auth::user();
    if (!isset($user)) {
        return view('auth.login-admin');
    } else {
        if ($user->hasRole('administrator')) {
            return redirect()->route('admin.dashboard.index');
        } else {
            return redirect()->route('home');
        }
    }
});

// Register direct to user
Route::get('/register-user/{ref_code?}', function ($ref_code = '') {
    return view('auth.register-user', compact('ref_code'));
});

// Register direct to member
Route::get('/register-member/{ref_code?}', function ($ref_code = '') {
    return view('auth.register-member', compact('ref_code'));
});

// Register direct to reseller
Route::get('/register-reseller/{ref_code?}', 'AddressController@registerReseller')
    ->name('register-reseller');

// Dashboard
Route::group([
    'middleware' => ['role:administrator|reseller|member|user'],
    'prefix' => '/admin/dashboard/',
    'as' => 'admin.dashboard.'
], function () {
    Route::get('', 'DashboardController@index')->name('index');
});

// Master Barang
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/barang/',
    'as' => 'admin.barang.'
], function () {
    Route::get('', 'BarangController@index')->name('index');
    Route::get('datatable', 'BarangController@datatable')->name('datatable');
    Route::get('edit/{kode_barang}', 'BarangController@edit')->name('edit');
    Route::get('delete/{kode_barang}', 'BarangController@destroy')->name('delete');
    Route::get('add', 'BarangController@create')->name('add');
    Route::post('store', 'BarangController@store')->name('store');
    Route::post('update/{kode_barang}', 'BarangController@update')->name('update');
    Route::post('create_kode', 'BarangController@create_kode')->name('create_kode');


    // barang related
    Route::post('barang-related', 'BarangController@barangRelated')->name('barang-related');

    Route::post('store-image', 'BarangController@storeBarangImage')->name('store-image');
    Route::get('delete-barang-image/{barangId?}/{id?}', 'BarangController@deleteBarangImage')->name('detele-barang-image');

    // edit barang image
    Route::get('edit-barang-image/{barangId?}/{id?}', 'BarangController@editBarangImage')->name('edit-barang-image');
    Route::post('update-barang-image/{barangId?}/{id?}', 'BarangController@updateBarangImage')->name('update-barang-image');
});

// Master Barang Image
Route::group([
    'prefix' => '/admin/barang/',
    'as' => 'admin.barang.'
], function () {
    Route::get('barang-image/{id?}', 'BarangController@getBarangImage')->name('barang-image');
});

// Master Supplier
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/supplier/',
    'as' => 'admin.supplier.'
], function () {
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
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/slider/',
    'as' => 'admin.slider.'
], function () {
    Route::get('', 'SliderController@index')->name('index');
    Route::get('datatable', 'SliderController@datatable')->name('datatable');
    Route::get('delete/{id}', 'SliderController@destroy')->name('delete');
    Route::post('store', 'SliderController@store')->name('store');
    Route::get('edit/{id?}', 'SliderController@edit')->name('edit');
    Route::get('shortable', 'SliderController@updateOrder')->name('shortable');
    Route::post('update/{id?}', 'SliderController@update')->name('update');
});

// Slider Image
Route::group([
    'prefix' => '/admin/slider/',
    'as' => 'admin.slider.'
], function () {
    Route::get('slider-image/{id?}', 'SliderController@getSliderImage')->name('slider-image');
});

// User
Route::group([
    'middleware' => ['role:administrator'],
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
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/series/',
    'as' => 'admin.series.'
], function () {
    Route::get('', 'SeriesController@index')->name('index');
    Route::get('datatable', 'SeriesController@datatable')->name('datatable');
    Route::get('edit/{kode_pack}', 'SeriesController@edit')->name('edit');
    Route::get('view/{kode_pack}', 'SeriesController@view')->name('view');
    Route::get('delete/{kode_pack}', 'SeriesController@destroy')->name('delete');
    Route::get('add', 'SeriesController@create')->name('add');
    Route::post('store', 'SeriesController@store')->name('store');
    Route::post('komposisi', 'SeriesController@komposisi')->name('komposisi');
    Route::post('update/{kode_pack}', 'SeriesController@update')->name('update');
});

// Referral
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/referral/',
    'as' => 'admin.referral.'
], function () {
    Route::get('', 'ReferralController@index')->name('index');
    Route::get('datatable', 'ReferralController@datatable')->name('datatable');
    Route::get('edit/{no_member}/{kode_up}', 'ReferralController@edit')->name('edit');
    // Route::get('view/{no_member}', 'ReferralController@view')->name('view');
    // Route::get('delete/{no_member}', 'ReferralController@destroy')->name('delete');
    Route::get('add', 'ReferralController@create')->name('add');
    Route::post('store', 'ReferralController@store')->name('store');
    Route::post('leads', 'ReferralController@leads')->name('leads');
    Route::post('down', 'ReferralController@down')->name('down');
    // Route::post('downline', 'ReferralController@downline')->name('downline');
    Route::post('update/{no_member}', 'ReferralController@update')->name('update');
});

// Penjualan
Route::group([
    'middleware' => ['role:administrator'],
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

// Pemesanan
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/pemesanan/',
    'as'     => 'admin.pemesanan.'
], function () {
    Route::get('', 'PemesananController@index')->name('index');
    Route::get('datatable', 'PemesananController@datatable')->name('datatable');
    Route::get('show/{id}', 'PemesananController@show')->name('show');
    Route::get('show_immediate/{id}', 'PemesananController@showImmediate')->name('show_immediate');
    Route::get('add', 'PemesananController@add')->name('add');
    Route::post('store', 'PemesananController@store')->name('store');
    Route::get('cronCancelProduct/{id}', 'PemesananController@cronCancelProduct')->name('cronCancelProduct');
    Route::post('update-status/{id?}', 'PemesananController@setStatus')->name('update-status');
    Route::get('print_trf/{id?}', 'PemesananController@printTrf')->name('print_trf');
    Route::get('print_immadiate/{id?}', 'PemesananController@printImmadiate')->name('print_immadiate');
});

// Cashback
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/cashback/',
    'as' => 'admin.cashback.'
], function () {
    Route::get('', 'CashbackController@index')->name('index');
    Route::get('datatable', 'CashbackController@datatable')->name('datatable');
    Route::post('hitung', 'CashbackController@hitung')->name('hitung');
});

// Konfirmasi penjualan
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/konfirmasi-penjualan/',
    'as'     => 'admin.konfirmasi-penjualan.'
], function () {
    Route::get('/', 'KonfirmasiPenjualanController@index')->name('index');
    Route::get('/datatable', 'KonfirmasiPenjualanController@datatable')->name('datatable');
    Route::get('/edit/{id}', 'KonfirmasiPenjualanController@edit')->name('edit');
    Route::get('/cancel/{id}', 'KonfirmasiPenjualanController@cancel')->name('cancel');
});

// Konfirmasi penjualan image
Route::group([
    'prefix' => '/admin/konfirmasi-penjualan/',
    'as'     => 'admin.konfirmasi-penjualan.'
], function () {
    Route::get('konfirmasi-image/{id?}', 'KonfirmasiPenjualanController@getKonfirmasiImage')->name('konfirmasi-image');
});

// Konfirmasi daftar
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/konfirmasi-daftar/',
    'as'     => 'admin.konfirmasi-daftar.'
], function () {
    Route::get('/', 'KonfirmasiDaftarController@index')->name('index');
    Route::get('/datatable', 'KonfirmasiDaftarController@datatable')->name('datatable');
    Route::get('/edit/{id}/{jenis?}', 'KonfirmasiDaftarController@edit')->name('edit');
    Route::get('/cancel/{id}', 'KonfirmasiDaftarController@cancel')->name('cancel');
});

// Konfirmasi daftar image
Route::group([
    'prefix' => '/admin/konfirmasi-daftar/',
    'as'     => 'admin.konfirmasi-daftar.'
], function () {
    Route::get('konfirmasi-daftar-image/{id?}', 'KonfirmasiDaftarController@getKonfirmasiDaftarImage')->name('konfirmasi-daftar-image');
});

// Coupon
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/coupon/',
    'as' => 'admin.coupon.'
], function () {
    Route::get('', 'CouponController@index')->name('index');
    Route::get('datatable', 'CouponController@datatable')->name('datatable');
    Route::get('edit/{id}', 'CouponController@edit')->name('edit');
    Route::get('view/{id}', 'CouponController@view')->name('view');
    Route::get('delete/{id}', 'CouponController@destroy')->name('delete');
    Route::get('add', 'CouponController@create')->name('add');
    Route::post('store', 'CouponController@store')->name('store');
    Route::post('update/{id}', 'CouponController@update')->name('update');
});

// Bank
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/bank/',
    'as' => 'admin.bank.'
], function () {
    Route::get('', 'BankController@index')->name('index');
    Route::get('datatable', 'BankController@datatable')->name('datatable');
    Route::get('edit/{id}', 'BankController@edit')->name('edit');
    Route::get('delete/{id}', 'BankController@destroy')->name('delete');
    Route::get('add', 'BankController@create')->name('add');
    Route::post('store', 'BankController@store')->name('store');
    Route::post('update/{id}', 'BankController@update')->name('update');
});

// Setting
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/setting/',
    'as' => 'admin.setting.'
], function () {
    Route::get('', 'SettingController@index')->name('index');
    Route::get('datatable', 'SettingController@datatable')->name('datatable');
    Route::get('edit/{id}', 'SettingController@edit')->name('edit');
    Route::get('delete/{id}', 'SettingController@destroy')->name('delete');
    Route::get('add', 'SettingController@create')->name('add');
    Route::post('store', 'SettingController@store')->name('store');
    Route::post('update/{id}', 'SettingController@update')->name('update');
});

// Barang SPB
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/barangspb/',
    'as' => 'admin.barangspb.'
], function () {
    Route::get('', 'BarangSpbController@index')->name('index');
    Route::get('datatable', 'BarangSpbController@datatable')->name('datatable');
    Route::get('view/{id}', 'BarangSpbController@view')->name('view');
    Route::get('delete/{id}', 'BarangSpbController@destroy')->name('delete');
    Route::post('update/{id}', 'BarangSpbController@update')->name('update');
});

// PEMBELIAN
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/pembelian/',
    'as' => 'admin.pembelian.'
], function () {
    Route::get('', 'PembelianController@index')->name('index');
    Route::get('datatable', 'PembelianController@datatable')->name('datatable');
    Route::get('show/{id}', 'PembelianController@show')->name('show');
    Route::get('add', 'PembelianController@add')->name('add');
    Route::get('get.nama', 'PembelianController@getNama')->name('get.nama');
    Route::post('create_kode', 'PembelianController@create_kode')->name('create.kode');
    Route::post('store', 'PembelianController@store')->name('store');
    Route::get('edit/{id}', 'PembelianController@edit')->name('edit');
    Route::get('delete/{id}', 'PembelianController@destroy')->name('delete');
});

// Adjusment
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/adjusment/',
    'as' => 'admin.adjusment.'
], function () {
    Route::get('', 'AdjusmentController@index')->name('index');
    Route::get('datatable', 'AdjusmentController@datatable')->name('datatable');
    Route::get('edit/{no_so}', 'AdjusmentController@edit')->name('edit');
    Route::get('view/{no_so}', 'AdjusmentController@view')->name('view');
    Route::get('delete/{no_so}', 'AdjusmentController@destroy')->name('delete');
    Route::get('add', 'AdjusmentController@create')->name('add');
    Route::post('store', 'AdjusmentController@store')->name('store');
    Route::post('komposisi', 'AdjusmentController@komposisi')->name('komposisi');
    Route::post('update/{no_so}', 'AdjusmentController@update')->name('update');
});