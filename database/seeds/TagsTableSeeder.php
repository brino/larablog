<?php

use Illuminate\Database\Seeder;

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


        $this->tags = App\Tag::pluck('id','id');

        App\Article::all()->each(function($item){
            $item->tags()->attach($this->tags->random(3)->all());
        });

        App\Article::addAllToIndex();
    }
}
