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
    $body = collect($faker->paragraphs(20))->map(function() use($faker) {
        return '<p>'.$faker->paragraph(20).'</p>';
    })->all();

    $user = App\User::where('contributor',true)->orderBy(\DB::raw('RAND()'))->first();

    $category = App\Category::orderBy(\DB::raw('RAND()'))->first();


    $created = $faker->dateTimeThisMonth();
    $published = \Carbon\Carbon::instance($created)->timezone('America/Chicago')->addDays(rand(2,10));


    return [
        'title' => $title = $faker->sentence(),
        'user_id' => $user->id,
        'category_id' => $category->id,
        'body' => implode('',$body),
        'summary' => $faker->paragraph(5),
        'slug' => str_slug(strtolower($title)),
        'published_at' => $published,
        'created_at' => $created,
        'views' => $faker->randomNumber(3),
    ];
});

$factory->define(App\Media::class, function (Faker\Generator $faker) {
    $user = App\User::where('contributor',true)->orderBy(\DB::raw('RAND()'))->first();

    $category = App\Category::orderBy(\DB::raw('RAND()'))->first();

    $created = $faker->dateTimeThisMonth();
    $published = \Carbon\Carbon::instance($created)->timezone('America/Chicago')->addDays(rand(2,10));

    return [
        'title' => $title = $faker->sentence(),
        'slug' => str_slug(strtolower($title)),
        'description' => $faker->sentence(),
        'user_id' => $user->id,
        'category_id' => $category->id,
        'published_at' => $published,
        'created_at' => $created,
    ];
});
