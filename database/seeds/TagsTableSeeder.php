<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([['name' => 'php', 'slug' => 'php', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'mysql', 'slug' => 'mysql', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'javascript', 'slug' => 'javascript', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'd3', 'slug' => 'd3', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'elasticsearch', 'slug' => 'elasticsearch', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'laravel', 'slug' => 'laravel', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'eloquent', 'slug' => 'eloquent', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'data', 'slug' => 'data', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'analysis', 'slug' => 'analysis', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'visualization', 'slug' => 'visualization', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('tags')->insert([['name' => 'info-graphic', 'slug' => 'info-graphic', 'created_at' => date('Y-m-d H:i:s')]]);


        $tags = App\Tag::pluck('id','id');

        App\Article::all()->each(function($item) use($tags) {
            $item->tags()->attach($tags->random(rand(1,4))->all());
        });

        Artisan::call('scout:import',['model'=>'App\Article']);
    }
}
