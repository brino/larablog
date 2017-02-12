<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Media;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(strtolower(App::environment()) != 'production'){

            factory(Media::class, 1)->create();

        }
    }
}
