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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('products', 'ProductController@index')->name('products.index');

Route::get('product/create', 'ProductController@create')->name('products.create');

Route::post('product/store', 'ProductController@store')->name('products.store');

Route::get('stocks', 'StockController@index')->name('stocks.index');

Route::get('stock/create/{product?}', 'StockController@create')->name('stocks.create');

Route::post('stock/store', 'StockController@store')->name('stocks.store');

Route::get('types', 'TypesController@index')->name('types.index');

Route::get('type/create', 'TypesController@create')->name('types.create');

Route::post('type/store', 'TypesController@store')->name('types.store');

Route::get('types/get/{type?}', 'TypesController@get')->name('types.get');
