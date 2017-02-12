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

        DB::table('categories')->insert([['name' => 'Technology', 'icon' => 'fa-microchip', 'description' => 'The collection of techniques, skills, methods and processes used in the production of goods or services or in the accomplishment of objectives, such as scientific investigation.', 'slug' => 'technology', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('categories')->insert([['name' => 'Big Data', 'icon' => 'fa-area-chart',  'description' => 'Extremely large data sets that may be analyzed computationally to reveal patterns, trends, and associations, especially relating to human behavior and interactions.','slug' => 'big-data', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('categories')->insert([['name' => 'Web Development', 'icon' => 'fa-file-code-o', 'description' => 'The work involved in developing a web site for the Internet or an intranet.', 'slug' => 'web-development', 'created_at' => date('Y-m-d H:i:s')]]);
        DB::table('categories')->insert([['name' => 'Linux', 'icon' => 'fa-linux', 'description' => 'A Unix-like computer operating system assembled under the model of free and open-source software development and distribution.', 'slug' => 'linux', 'created_at' => date('Y-m-d H:i:s')]]);
    }
}
