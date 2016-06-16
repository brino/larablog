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

Route::auth();

Route::any('/articles','ArticlesController@index')->name('articles');

Route::get('/category/{categorySlug}','ArticlesController@category')->name('category');

Route::get('/tag/{tagSlug}','ArticlesController@tag')->name('tag');

Route::get('/article/{articleSlug}','ArticlesController@show')->name('article');

Route::get('/photos','PhotosController@index')->name('photos');

Route::get('/photo/{photoSlug}','PhotosController@show')->name('photo');

Route::get('/about','AboutController@index')->name('about');

Route::get('/sitemaps','SiteMapsController@index')->name('sitemaps');

Route::get('/sitemaps/articles','SiteMapsController@articles')->name('sitemaps.articles');

Route::get('/sitemaps/photos','SiteMapsController@photos')->name('sitemaps.photos');

Route::get('/sitemaps/general','SiteMapsController@general')->name('sitemaps.general');

Route::group(['namespace' => 'Admin'], function() {

    Route::get('/admin', 'DashboardController@index')->name('admin');

    Route::resource('admin/article','ArticleController');

    Route::resource('admin/photo', 'PhotoController');

    Route::resource('admin/category','CategoryController');

    Route::resource('admin/tag','TagController');

    Route::resource('admin/user','UserController');
    
});
