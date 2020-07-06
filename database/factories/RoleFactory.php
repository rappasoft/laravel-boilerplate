<?php

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement([User::TYPE_ADMIN, User::TYPE_USER]),
        'name' => $faker->word,
    ];
});
