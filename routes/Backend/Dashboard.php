<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('restaurant', 'RestaurantController@addRestro')->name('addRestro');

Route::post('storerestro', 'RestaurantController@storeRestro')->name('storeRestro');

Route::get('edit/{restro_id}', 'RestaurantController@editRestro')->name('editRestro');

Route::post('updaterestro/{restro_id}', 'RestaurantController@updateRestro')->name('updateRestro');

Route::get('delete/{restro_id}', 'RestaurantController@deleteRestro')->name('deleteRestro');

Route::get('foodcategory', 'FoodCategoryController@addFoodCategory')->name('addFoodCategory');

Route::post('storefood', 'FoodCategoryController@storeFoodTypes')->name('storeFoodTypes');