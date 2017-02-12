<?php

namespace App\Providers;

use App\Media;
use App\Article;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

        parent::boot();

        Route::model('media', Media::class);

//        Route::bind('article', function ($value) {
//            return Article::where('title', $value)->first();
//        });

//        Route::bind('articleSlug', function($value) {
//            return Article::where('slug',$value)->first();
//        });
//
//        Route::bind('mediaSlug', function($value) {
//            return Media::where('slug',$value)->first();
//        });
//
//        Route::bind('categorySlug', function($value) {
//            return Category::where('slug',$value)->first();
//        });
//
//        Route::bind('tagSlug', function($value) {
//            return Tag::where('slug',$value)->first();
//        });
        
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);
        $this->mapApiRoutes($router);

    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }

    /**
     * @param Router $router
     */
    protected function mapApiRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'api',
        ], function ($router) {
            require app_path('Http/api.php');
        });
    }
}
