<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Auth\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
