<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Note::class, function (Faker $faker) {
    $dateTime = $faker->dateTime();
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'category_id' => factory(\App\Models\Category::class)->create()->id,
        'title' => $faker->sentence(),
        'description' => $faker->text(),
        'done' => $faker->boolean(),
        'created_at' => $dateTime,
        'updated_at' => $dateTime,
    ];
});
