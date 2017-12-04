<?php

/**
 * All route names are prefixed with 'admin.'.
 */

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
//Route::resource('dashboards', 'DashboardController');


Route::resource('restaurants', 'RestaurantController');

//Route::get('restaurant', 'RestaurantController@addRestro')->name('addRestro');

//Route::post('storerestro', 'RestaurantController@storeRestro')->name('storeRestro');

//Route::get('edit/{restro_id}', 'RestaurantController@editRestro')->name('editRestro');

//Route::post('updaterestro/{restro_id}', 'RestaurantController@updateRestro')->name('updateRestro');

//Route::get('delete/{restro_id}', 'RestaurantController@deleteRestro')->name('deleteRestro');

Route::resource('categories', 'CategoryController');


Route::resource('items', 'ItemController');

//Route::get('categories', 'CategoryController@addCategory')->name('addCategory');

//Route::post('storefood', 'CategoryController@storeFoodTypes')->name('storeFoodTypes');

//Route::get('additems', 'CategoryController@addFoodItems')->name('addFoodItems');


Route::get('additems/{restro_id}', 'ItemController@addFoodItems')->name('addFoodItems');

