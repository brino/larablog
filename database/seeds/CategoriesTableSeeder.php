<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([['name' => 'Technology', 'slug' => 'technology', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('categories')->insert([['name' => 'Big Data', 'slug' => 'big-data', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('categories')->insert([['name' => 'Web Development', 'slug' => 'web-development', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('categories')->insert([['name' => 'Linux', 'slug' => 'linux', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('categories')->insert([['name' => 'Outdoors', 'slug' => 'outdoors', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('categories')->insert([['name' => 'Backpacking', 'slug' => 'backpacking', 'created_at' => date('Y-m-d H:i:s')]]);
    }
}
