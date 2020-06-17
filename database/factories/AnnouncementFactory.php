<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Domains\Announcement\Models\Announcement::class, function (Faker $faker) {
    return [
        'area' => $faker->randomElement(['frontend', 'backend']),
        'type' => $faker->randomElement(['info', 'danger', 'warning', 'success']),
        'message' => $faker->text,
        'enabled' => $faker->boolean,
        'starts_at' => $faker->dateTime(),
        'ends_at' => $faker->dateTime(),
    ];
});
