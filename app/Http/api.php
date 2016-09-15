<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 6/16/16
 * Time: 6:03 PM
 */

use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/sitemap','SiteMapController@index')->name('sitemap');

Route::get('/sitemap/articles','SiteMapController@articles')->name('sitemap.articles');

Route::get('/sitemap/photos','SiteMapController@photos')->name('sitemap.photos');

Route::get('/sitemap/general','SiteMapController@general')->name('sitemap.general');