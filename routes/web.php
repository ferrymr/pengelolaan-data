<?php
use Illuminate\Support\Facades\Auth;

Auth::routes();

// =============================== BACKEND ===============================
Route::get('/', 'IndexController@index')->name('home');
// Login administrator
// Route::get('/login-administrator', function () {
//     $user = Auth::user();
//     if (!isset($user)) {
//         return view('auth.login-admin');
//     } else {
//         if ($user->hasRole('administrator')) {
//             return redirect()->route('admin.dashboard.index');
//         } else {
//             return redirect()->route('auth.login-admin');
//         }
//     }
// });

// Dashboard
Route::group([
    'middleware' => ['role:administrator|user'],
    'prefix' => '/admin/dashboard/',
    'as' => 'admin.dashboard.'
], function () {
    Route::get('', 'DashboardController@index')->name('index');
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

// Instansi
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/instansi/',
    'as' => 'admin.instansi.'
], function () {
    Route::get('', 'InstansiController@index')->name('index');
    Route::get('add', 'InstansiController@create')->name('add');
    Route::post('store', 'InstansiController@store')->name('store');
    Route::get('datatable', 'InstansiController@datatable')->name('datatable');
    Route::get('edit/{id}', 'InstansiController@edit')->name('edit');
    Route::get('delete/{id}', 'InstansiController@destroy')->name('delete');
    Route::post('update/{id}', 'InstansiController@update')->name('update');

});

// Jenis Layanan
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/layanan/',
    'as' => 'admin.layanan.'
], function () {
    Route::get('', 'JenisLayananController@index')->name('index');
    Route::get('add', 'JenisLayananController@create')->name('add');
    Route::post('store', 'JenisLayananController@store')->name('store');
    Route::get('datatable', 'JenisLayananController@datatable')->name('datatable');
    Route::get('edit/{id}', 'JenisLayananController@edit')->name('edit');
    Route::get('delete/{id}', 'JenisLayananController@destroy')->name('delete');
    Route::post('update/{id}', 'JenisLayananController@update')->name('update');

});

// Pembayaran
Route::group([
    'middleware' => ['role:administrator'],
    'prefix' => '/admin/pembayaran/',
    'as' => 'admin.pembayaran.'
], function () {
    // Route::get('', 'PembayaranController@index')->name('index');
    Route::get('get.nama', 'PembayaranController@getNama')->name('get.nama');
    Route::get('add', 'PembayaranController@create')->name('add');
    Route::post('store', 'PembayaranController@store')->name('store');
    // Route::get('datatable', 'PembayaranController@datatable')->name('datatable');
    Route::get('edit/{id}', 'PembayaranController@edit')->name('edit');
    Route::get('delete/{id}', 'PembayaranController@destroy')->name('delete');
    Route::post('update/{id}', 'PembayaranController@update')->name('update');

});

// View Pembayaran
Route::group([
    'middleware' => ['role:user|administrator'],
    'prefix' => '/admin/pembayaran/',
    'as' => 'admin.pembayaran.'
], function () {
    Route::get('', 'PembayaranController@index')->name('index');
    Route::get('datatable', 'PembayaranController@datatable')->name('datatable');
});