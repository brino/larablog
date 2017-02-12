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

    Route::get('/articles/autocomplete', 'SearchController@autocomplete')->name('articles.autocomplete');

    Route::get('/articles/{category?}', 'SearchController@index')->name('articles');

    Route::get('/article/{article}', 'ArticleController@show')->name('article');

    Route::get('/media', 'MediaController@index')->name('medias');

    Route::get('/media/{media}', 'MediaController@show')->name('media');

    Route::get('/profile/token', 'ProfileController@requestApiToken')->name('profile.token');

    Route::get('/profile/{user?}', 'ProfileController@show')->name('profile');

    Route::get('/contributors', 'ContributorController@index')->name('contributors');

    Route::group(['namespace' => 'Admin'], function () {

        Route::get('/admin', 'DashboardController@index')->name('admin');

        Route::resource('/admin/article', 'ArticleController');

        Route::delete('/admin/article/thumbnail/{article}', 'ArticleController@removeThumbnail');

        Route::delete('/admin/article/banner/{article}', 'ArticleController@removeBanner');

        Route::resource('/admin/media', 'MediaController',['parameters' => ['media'=>'media']]);

        Route::delete('/admin/media/url/{media}', 'MediaController@removeMedia');

        Route::resource('/admin/category', 'CategoryController');

        Route::resource('/admin/tag', 'TagController');

        Route::resource('/admin/user', 'UserController');

    });

