<?php

namespace App\Providers;

use App\Article;
use App\Notifications\ContributorCreatedNewArticle;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Notifications\NewUserSignup;
use App\User;
use Illuminate\Support\Facades\App;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        User::created(function($user){
            if(strtolower(App::environment()) == 'production') {
                $supers = User::where('super','=',1)->get();

                Notification::send($supers,new NewUserSignup($user));
            }
        });

        Article::created(function($article){
            if(strtolower(App::environment()) == 'production') {
                $supers = User::where('super', '=', 1)->get();

                Notification::send($supers, new ContributorCreatedNewArticle($article));
            }
        });

        Article::deleted(function($article){

            if(Storage::disk('public')->exists($article->banner)){
                Storage::disk('public')->delete($article->banner);
            }

            if(Storage::disk('public')->exists($article->thumbnail)){
                Storage::disk('public')->delete($article->thumbnail);
            }

        });

        Photo::deleted(function($photo){
            if(Storage::disk('public')->exists($photo->url)){
                Storage::disk('public')->delete($photo->url);
            }
        });

    }
}
