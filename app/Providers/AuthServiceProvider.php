<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //gates
        Gate::before(function ($user, $ability) {
            if($user->super) {
                return true;
            }

            return null;
        });

        Gate::define('create-article', function ($user) {

            return (bool)$user->contributor;
            
        });

        Gate::define('update-article', function ($user, $article) {

            if(isset($article->user) && $user->id === $article->user->id && $user->contributor){
                return true;
            }

            return false;
        });

        Gate::define('create-photo', function ($user) {

            return (bool)$user->contributor;

        });

        Gate::define('update-photo', function ($user, $photo) {

            if(isset($photo->user) && $user->id === $photo->user->id && $user->contributor){
                return true;
            }

            return false;
        });

        Gate::define('create-category', function ($user) {

            return (bool)$user->super;

        });

        Gate::define('update-category', function ($user) {

            return (bool)$user->super;
        });

        Gate::define('create-tag', function ($user) {

            return (bool)$user->super;

        });

        Gate::define('update-tag', function ($user) {

            return (bool)$user->super;
        });

        Gate::define('create-user', function ($user) {

            return (bool)$user->super;

        });

        Gate::define('update-user', function ($user) {

            return (bool)$user->super;
        });

    }
}
