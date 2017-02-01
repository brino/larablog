<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Photo;

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

            factory(Photo::class, 50)->create();

        }
    }
}
