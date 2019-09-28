<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->text(60),
        'description' => $faker->realText(rand(100,200)),
        'link' => rand(1, 5) . '.txt',
        'author_id' => rand(1, 50)
    ];
});
