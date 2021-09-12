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


// Master Supplier
Route::group([
    'middleware' => ['role:administrator|user'],
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
