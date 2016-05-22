<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(strtolower(App::environment()) != 'production'){
            DB::table('photos')->insert([['title' => 'BWCA Laker', 'description' => '26in Lake Trout Knife Lake MN', 'user_id' => 1, 'category_id' => 5, 'slug' => 'bwca-laker', 'url' => 'photo.jpg', 'created_at' => date('Y-m-d H:i:s')]]);
            DB::table('photos')->insert([['title' => 'Caribou Falls SHT', 'description' => 'View from below high falls Caribou River MN Superior Hiking Trail', 'user_id' => 1, 'category_id' => 5, 'slug' => 'sht-falls', 'url' => 'photo.jpg', 'created_at' => date('Y-m-d H:i:s')]]);
            DB::table('photos')->insert([['title' => 'Blond Fly Am', 'description' => 'A very young and blong Fly Ammatia Mushroom', 'user_id' => 1, 'category_id' => 5, 'slug' => 'blond-fy', 'url' => 'photo.jpg', 'created_at' => date('Y-m-d H:i:s')]]);
            DB::table('photos')->insert([['title' => 'SHT Sign', 'description' => 'Crooked sign before Secion 13 Superior Hiking Trail', 'user_id' => 1, 'category_id' => 5, 'slug' => 'sht-sign', 'url' => 'photo.jpg', 'created_at' => date('Y-m-d H:i:s')]]);

            Storage::disk('public')->put('photos/'.'photo.jpg',File::get(public_path('img/seeder/image.jpg')));

        }
    }
}
