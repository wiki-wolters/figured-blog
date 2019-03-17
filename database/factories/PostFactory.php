<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
        'image_url' => 'https://picsum.photos/1200/800?image=' . rand(50,2000),
        'title' => $faker->realText(40),
        'subtitle' => $faker->realText(60),
        'body' => implode("\n",array_map(function($para) { return "<p>$para</p>"; }, $faker->paragraphs(rand(5,10))))
    ];
});
