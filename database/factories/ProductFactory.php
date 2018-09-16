<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->sentence,
        'category_id' => $faker->numberBetween(1, 5),
        'price' => $faker->numberBetween(1, 2000),
        'description' => $faker->sentence,
        'photo' => '1.jpg'
        //
    ];
});
