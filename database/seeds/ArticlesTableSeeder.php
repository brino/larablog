<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(strtolower(App::environment()) != 'production'){
            
            factory(App\Article::class, 40)->create();

            Storage::disk('public')->put('banners/'.'banner.jpg',File::get(public_path('img/seeder/image.jpg')));
            Storage::disk('public')->put('thumbnails/'.'thumbnail.jpg',File::get(public_path('img/seeder/image.jpg')));

//            App\Article::addAllToIndex();
            
        }
    }
}
