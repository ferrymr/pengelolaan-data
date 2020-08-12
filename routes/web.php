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

Route::get('/products/category/{category}', 'ProductController@category')->name('products.category');
Route::resource('products', 'ProductController');

// Route::resource('shoppingcarts', 'ShoppingCartController');

Route::get('shoppingcart', 'ShoppingCartController@index')->name('shoppingcart.index');
Route::get('shoppingcart/delete/{id}', 'ShoppingCartController@destroy')->name('shoppingcart.destroy');

Route::get('/google', function () {
    return view('googleLogin');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
