<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(strtolower(App::environment()) == 'production'){
            
            factory(App\Article::class, 2)->create();

        } else {
            factory(App\Article::class, 500)->create();
        }

//        App\Article::makeAllSearchable();
    }
}
