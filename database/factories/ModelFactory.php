<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'bio' => $faker->paragraphs(3,true),
        'super' => false,
        'contributor' => rand(0,1),
        'password' => bcrypt(str_random(10)),
        'password' => bcrypt('temp4now'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $body = [];
    foreach($faker->paragraphs(5) as $paragraph){
        $body[] = "<p>".$paragraph."</p>";
    }

    $user = App\User::where('contributor',true)->orderBy(\DB::raw('RAND()'))->first();

    $category = App\Category::orderBy(\DB::raw('RAND()'))->first();

    $days = rand(1,10);

    $created = $faker->dateTimeThisMonth();
    $published = \Carbon\Carbon::instance($created)->addDays($days);


    return [
        'title' => $faker->sentence(),
        'user_id' => $user->id,
        'category_id' => $category->id,
        'body' => implode('',$body),
        'summary' => $body[0],
        'banner' => 'banner.jpg',
        'thumbnail' => 'thumbnail.jpg',
        'slug' => str_replace(' ','-',strtolower($faker->words(5,true))),
        'published_at' => $published,
        'created_at' => $created
    ];
});

//$factory->define(App\Photo::class, function (Faker\Generator $faker) {
//    return [
//        'title' => $faker->name,
//        'slug' => $faker->safeEmail,
//        'description' => false,
//        'url' => rand(0,1),
//        'user_id' => bcrypt(str_random(10)),
//        'cagtegory_id' => bcrypt(str_random(10)),
//        'published_at' => bcrypt('temp4now'),
//        'createde_at' => str_random(10),
//    ];
//});
