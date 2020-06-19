<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Domains\Auth\Models\PasswordHistory;

$factory->define(PasswordHistory::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber(),
        'password' => bcrypt($faker->password),
    ];
});
