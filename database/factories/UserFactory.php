<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Domains\Auth\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement([User::TYPE_ADMIN, User::TYPE_USER]),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'secret',
        'password_changed_at' => null,
        'remember_token' => Str::random(10),
        'active' => true,
    ];
});

$factory->state(User::class, 'admin', function () {
    return [
        'type' => User::TYPE_ADMIN,
    ];
});

$factory->state(User::class, 'user', function () {
    return [
        'type' => User::TYPE_USER,
    ];
});

$factory->state(User::class, 'active', function () {
    return [
        'active' => true,
    ];
});

$factory->state(User::class, 'inactive', function () {
    return [
        'active' => false,
    ];
});

$factory->state(User::class, 'confirmed', function () {
    return [
        'email_verified_at' => now(),
    ];
});

$factory->state(User::class, 'unconfirmed', function () {
    return [
        'email_verified_at' => null,
    ];
});

$factory->state(User::class, 'password_expired', function () {
    return [
        'password_changed_at' => now()->subYears(5),
    ];
});

$factory->state(User::class, 'deleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
