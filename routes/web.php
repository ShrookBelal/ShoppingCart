<?php

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

Route::get('/products', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@showProduct')->name('product');
Route::get('/product/{id}/like', 'ProductController@like')->name('like');
Route::post('/product', 'ProductController@store')->name('review');

// Route::resource('/cart', 'CartController');
Route::post('/cart/{id}', 'CartController@storeproducts')->name('cart');
Route::get('/cart/products/{id}', 'CartController@storeproduct')->name('cartproducts');
Route::get('/cart/productdelete/{id}', 'CartController@destroy')->name('deleteproduct');
Route::get('/showcart', 'CartController@showcart')->name('show');
Route::post('/cartupdate', 'CartController@update')->name('cartupdate');

Route::get('/checkout', 'OrderController@index')->name('checkout');
Route::get('/order/{Total}', 'OrderController@order')->name('order');
Route::post('/promocode', 'OrderController@checkcode')->name('promocode');


Auth::routes();

Route::get('/', 'HomeController@index2');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/homesearch', 'HomeController@search')->name('search');

///paypal routes
Route::group(['middleware' => ['web']], function () {
    Route::post('getCheckout', ['as' => 'getCheckout', 'uses' => 'OrderController@getCheckout']);
    Route::get('getDone', ['as' => 'getDone', 'uses' => 'OrderController@getDone']);
    Route::get('getCancel', ['as' => 'getCancel', 'uses' => 'OrderController@getCancel']);
});

// Route::get('search', 'SearchController@index')->name('search');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');
