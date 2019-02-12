<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Note::class, function (Faker $faker) {
    $updated = $faker->optional()->dateTime();
    $dateTime = $faker->dateTime($updated);
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'category_id' => $faker->numberBetween(1, 10),
        'title' => $faker->sentence(),
        'description' => $faker->text(),
        'done' => $faker->boolean(),
        'created_at' => $dateTime,
        'updated_at' => $updated,
    ];
});
