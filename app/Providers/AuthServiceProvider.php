<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;

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

        Gate::define('contributor', function ($user) {

            return (bool)$user->contributor;

        });

        Gate::define('super', function ($user) {

            return (bool)$user->super;

        });

        Gate::define('update-article', function ($user, $article) {

            return $user->id === $article->user->id && $user->contributor;
        });

        Gate::define('update-photo', function ($user, $photo) {

            return $user->id === $photo->user->id && $user->contributor;
        });

        Gate::define('update-user', function ($self,$user) {

            return $user->id == $self->id;

        });

    }
}
