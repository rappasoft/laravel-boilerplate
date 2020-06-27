<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Domains\Announcement\Models\Announcement;
use Faker\Generator as Faker;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'area' => $faker->randomElement(['frontend', 'backend']),
        'type' => $faker->randomElement(['info', 'danger', 'warning', 'success']),
        'message' => $faker->text,
        'enabled' => $faker->boolean,
        'starts_at' => $faker->dateTime(),
        'ends_at' => $faker->dateTime(),
    ];
});

$factory->state(Announcement::class, 'enabled', function () {
    return [
        'enabled' => true,
    ];
});

$factory->state(Announcement::class, 'disabled', function () {
    return [
        'enabled' => false,
    ];
});

$factory->state(Announcement::class, 'frontend', function () {
    return [
        'area' => 'frontend',
    ];
});

$factory->state(Announcement::class, 'backend', function () {
    return [
        'area' => 'backend',
    ];
});

$factory->state(Announcement::class, 'global', function () {
    return [
        'area' => null,
    ];
});

$factory->state(Announcement::class, 'no-dates', function () {
    return [
        'starts_at' => null,
        'ends_at' => null,
    ];
});

$factory->state(Announcement::class, 'inside-date-range', function () {
    return [
        'starts_at' => now()->subWeek(),
        'ends_at' => now()->addWeek(),
    ];
});

$factory->state(Announcement::class, 'outside-date-range', function () {
    return [
        'starts_at' => now()->subWeeks(2),
        'ends_at' => now()->subWeek(),
    ];
});
