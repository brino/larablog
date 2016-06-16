<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 6/16/16
 * Time: 6:03 PM
 */

Route::get('/sitemaps','SiteMapsController@index')->name('sitemaps');

Route::get('/sitemaps/articles','SiteMapsController@articles')->name('sitemaps.articles');

Route::get('/sitemaps/photos','SiteMapsController@photos')->name('sitemaps.photos');

Route::get('/sitemaps/general','SiteMapsController@general')->name('sitemaps.general');