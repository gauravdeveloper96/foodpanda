<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/send', 'ContactController@send')->name('contact.send');
Route::get('search','RestaurantController@search')->name('search');
Route::get('search/{restro_id}','RestaurantController@ViewMenu');
Route::post('restaurants','RestaurantController@searchByLocation')->name('searchByLocation');

Route::get('restaurantmenu/{restro_id}','RestaurantController@ViewMenu')->name('viewMenu');

Route::get('fileentry', 'FileEntryController@index')->name('fileentry');

Route::get('fileentry/get/{filename}', ['as' => 'getentry', 'uses' => 'FileentryController@get']);


/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        Route::get('addtocart/{item_id}', 'CartController@addToCart')->name('addtocart');
        

        //restaurantSearch
        
    });
    
});
