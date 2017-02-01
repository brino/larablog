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
        'api_token' => str_random(60),
        'super' => false,
        'contributor' => rand(0,1),
        'password' => 'temp4now',
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $body = [];
    foreach($faker->paragraphs(5) as $paragraph){
        $body[] = "<p>".$paragraph."</p>";
    }

    $user = App\User::where('contributor',true)->orderBy(\DB::raw('RAND()'))->first();

    $category = App\Category::orderBy(\DB::raw('RAND()'))->first();


    $created = $faker->dateTimeThisMonth();
    $published = \Carbon\Carbon::instance($created)->timezone('America/Chicago')->addDays(rand(2,10));


    return [
        'title' => $faker->sentence(),
        'user_id' => $user->id,
        'category_id' => $category->id,
        'body' => implode('',$body),
        'summary' => $body[0],
        'banner' => 'http://placehold.it/1024x250?text='.urlencode($faker->words(5,true)),
        'thumbnail' => 'http://placehold.it/300?text='.urlencode($faker->words(2,true)),
        'slug' => str_replace(' ','-',strtolower($faker->words(5,true))),
        'published_at' => $published,
        'created_at' => $created
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    $user = App\User::where('contributor',true)->orderBy(\DB::raw('RAND()'))->first();

    $category = App\Category::orderBy(\DB::raw('RAND()'))->first();

    $created = $faker->dateTimeThisMonth();
    $published = \Carbon\Carbon::instance($created)->timezone('America/Chicago')->addDays(rand(2,10));

    return [
        'title' => $faker->sentence(),
        'slug' => str_replace(' ','-',strtolower($faker->words(5,true))),
        'description' => $faker->sentence(),
        'url' => 'http://placehold.it/768?text='.urlencode($faker->words(5,true)),
        'user_id' => $user->id,
        'category_id' => $category->id,
        'published_at' => $published,
        'created_at' => $created,
    ];
});
