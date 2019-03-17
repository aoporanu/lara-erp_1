<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('products', 'ProductController@index')->name('products.index');

Route::get('product/create', 'ProductController@create')->name('products.create');

Route::post('product/store', 'ProductController@store')->name('products.store');

Route::get('stocks', 'StockController@index')->name('stocks.index');

Route::get('stock/create/{product?}', 'StockController@create')->name('stocks.create');

Route::post('stock/store', 'StockController@store')->name('stocks.store');

Route::get('types', 'TypesController@index')->name('types.index');

Route::get('type/{type?}', 'TypesController@index')->name('types.get');

Route::get('type/create', 'TypesController@create')->name('types.create');

Route::post('type/store', 'TypesController@store')->name('types.store');

Route::get('/orders/{username?}', 'OrdersController@show')->name('orders.show');

Route::get('/shops', 'ShopController@index')->name('shops.index');

Route::get('/shop/{public_id?}/orders', 'ShopController@show')->name('shops.show');

Route::get('/shop/create', 'ShopController@create')->name('shops.create');

Route::post('/shop/store', 'ShopController@store')->name('shops.store');

Route::get('order/create', 'OrdersController@create')->name('orders.create');

Route::post('order/store', 'OrdersController@store')->name('orders.store');

Route::get('orders', 'OrdersController@index')->name('orders.index');

Route::get('users', 'UsersController@index')->name('users.index');

Route::get('distributors', 'DistributorController@index')->name('distributors.index');

Route::get('distributor/create', 'DistributorController@create')->name('distributors.create');

Route::post('distributor/store', 'DistributorController@store')->name('distributors.store');

Route::get('{username?}/distributors/show', 'DistributorController@show')->name('distributors.show');

Route::get('{username?}/products', 'UserController@myProducts')->name('agent.products');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{username?}/distributors', 'UserController@show')->name('users.show');
