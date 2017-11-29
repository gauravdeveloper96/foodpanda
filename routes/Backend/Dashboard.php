<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('restaurant', 'RestaurantController@addRestro')->name('addRestro');

Route::post('storerestro', 'RestaurantController@storeRestro')->name('storeRestro');

Route::get('foodcategory', 'FoodCategoryController@addFoodCategory')->name('addFoodCategory');

Route::post('storefood', 'FoodCategoryController@storeFoodTypes')->name('storeFoodTypes');