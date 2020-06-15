<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Domains\Auth\Models\PasswordHistory::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber(),
        'password' => bcrypt($faker->password),
    ];
});
