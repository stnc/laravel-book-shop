<?php

use Faker\Generator as Faker;

$factory->define(App\Models\A_books::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->text(1000),
       // 'puplishing_house_id' => 1,
    ];
});
