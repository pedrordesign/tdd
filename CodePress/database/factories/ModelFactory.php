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

use CodePress\CodeCategory\Models\Category;
use CodePress\CodePost\Models\Comment;
use CodePress\CodePost\Models\Post;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'active' => true
    ];
});

$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph
    ];
});

$factory->define(Comment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->paragraph
    ];
});