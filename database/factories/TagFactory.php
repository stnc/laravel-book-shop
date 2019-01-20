<?php

use Faker\Generator as Faker;

//https://laracasts.com/discuss/channels/general-discussion/how-do-i-seed-many-to-many-polymorphic-relationships

$factory->define(\App\Models\Tag::class, function(Faker $faker) {
    return [
        'name'        => $faker->domainWord,
        'created_at'  => $faker->dateTimeInInterval('-7 days'),
        'updated_at'  => $faker->dateTimeInInterval('-7 days'),
    ];
});