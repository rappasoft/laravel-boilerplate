<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Domains\Auth\Models\PasswordHistory;
use Faker\Generator as Faker;

$factory->define(PasswordHistory::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber(),
        'password' => bcrypt($faker->password),
    ];
});
