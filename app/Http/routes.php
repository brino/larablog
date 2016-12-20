<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/logout', 'Auth\LoginController@logout');

    Route::auth();

    Route::get('/articles/{categorySlug?}', 'SearchController@index')->name('articles');

    Route::get('/article/{articleSlug}', 'ArticleController@show')->name('article');

    Route::get('/photo', 'PhotoController@index')->name('photos');

    Route::get('/photo/{photoSlug}', 'PhotoController@show')->name('photo');

//    Route::get('/about', 'AboutController@index')->name('about');

    Route::get('/profile/{user?}', 'ProfileController@show')->name('profile');

//    Route::get('/profile/{user}', 'ProfileController@show')->name('profile');


    Route::group(['namespace' => 'Admin'], function () {

        Route::get('/admin', 'DashboardController@index')->name('admin');

        Route::resource('admin/article', 'ArticleController');

        Route::resource('admin/photo', 'PhotoController');

        Route::resource('admin/category', 'CategoryController');

        Route::resource('admin/tag', 'TagController');

        Route::resource('admin/user', 'UserController');

    });

