<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 6/16/16
 * Time: 6:03 PM
 */

use Illuminate\Http\Request;


Route::group(['namespace' => 'Api','prefix' => 'api','middleware' => ['auth:api','api']], function () {

    Route::get('article', 'ArticleController@index')->name('api.article.index');

    Route::get('article/user','UserArticleController@index')->name('api.article.user.index');

    Route::get('user', function () {
        return Auth::guard('api')->user();
    })->name('api.user.show');
});





Route::get('/sitemap','SiteMapController@index')->name('sitemap');

Route::get('/sitemap/articles','SiteMapController@articles')->name('sitemap.articles');

Route::get('/sitemap/media','SiteMapController@media')->name('sitemap.media');

Route::get('/sitemap/general','SiteMapController@general')->name('sitemap.general');