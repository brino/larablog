<?php

namespace App\Providers;

use App\Article;
use App\Category;
use App\Photo;
use App\Tag;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {

        parent::boot($router);

        $router->bind('articleSlug', function($value) {
            return Article::where('slug',$value)->first();
        });

        $router->bind('photoSlug', function($value) {
            return Photo::where('slug',$value)->first();
        });

        $router->bind('categorySlug', function($value) {
            return Category::where('slug',$value)->first();
        });

        $router->bind('tagSlug', function($value) {
            return Tag::where('slug',$value)->first();
        });
        
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
