<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //gates
        $gate->before(function ($user, $ability) {
            if($user->super) {
                return true;
            }

            return null;
        });

        $gate->define('create-article', function ($user) {

            return (bool)$user->contributor;
            
        });

        $gate->define('update-article', function ($user, $article) {

            if(isset($article->user) && $user->id === $article->user->id && $user->contributor){
                return true;
            }

            return false;
        });

        $gate->define('create-photo', function ($user) {

            return (bool)$user->contributor;

        });

        $gate->define('update-photo', function ($user, $photo) {

            if(isset($photo->user) && $user->id === $photo->user->id && $user->contributor){
                return true;
            }

            return false;
        });
        
        $gate->define('create-category', function ($user) {

            return (bool)$user->super;

        });

        $gate->define('update-category', function ($user) {

            return (bool)$user->super;
        });

        $gate->define('create-tag', function ($user) {

            return (bool)$user->super;

        });

        $gate->define('update-tag', function ($user) {

            return (bool)$user->super;
        });

        $gate->define('create-user', function ($user) {

            return (bool)$user->super;

        });

        $gate->define('update-user', function ($user) {

            return (bool)$user->super;
        });

    }
}
