<?php

namespace App\Providers;

use App\Article;
use App\Notifications\ContributorCreatedNewArticle;
use App\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Notifications\NewUserSignup;
use App\User;
use Illuminate\Support\Facades\App;
use App\Category;

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
            if(!empty($article->banner) && Storage::disk('public')->exists($article->banner)){
                Storage::disk('public')->delete($article->banner);
            }
        });

        Category::deleted(function($category){
            if(!empty($category->thumbnail) && Storage::disk('public')->exists($category->thumbnail)){
                Storage::disk('public')->delete($category->thumbnail);
            }
        });

        Media::deleted(function($media){
            if(!empty($media->url) && Storage::disk('public')->exists($media->url)){
                Storage::disk('public')->delete($media->url);
            }
        });

    }
}
