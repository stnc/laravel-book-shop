<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Posts::class, function (Faker $faker) {
    $content=$faker->text(1000);
    $excerpts= substr($content,0,50);
    return [
        'post_author' => 1,
        'post_title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'post_content' => $content,
        'post_excerpts' => $excerpts,
        'comment_status' =>1,
        'media_picture' =>"",
        'post_order' =>1,
        'post_status' => 1,
        'created_at'  => $faker->dateTimeInInterval('-7 days'),
        'updated_at'  => $faker->dateTimeInInterval('-7 days'),
    ];
});
