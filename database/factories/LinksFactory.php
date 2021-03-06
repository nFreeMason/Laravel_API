<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Link::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->title,
        'link' => $faker->url,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
