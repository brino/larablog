<?php

namespace App\Providers;

use App\Article;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        Article::saved(function($article){
            $article->addToIndex();
        });

        Article::deleted(function($article){

            if(Storage::disk('public')->exists($article->banner)){
                Storage::disk('public')->delete($article->banner);
            }

            if(Storage::disk('public')->exists($article->thumbnail)){
                Storage::disk('public')->delete($article->thumbnail);
            }

            $article->removeFromIndex();

        });

        Photo::deleted(function($photo){
            if(Storage::disk('public')->exists($photo->url)){
                Storage::disk('public')->delete($photo->url);
            }
        });

    }
}
