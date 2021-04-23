<?php

namespace Database\Factories;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * Class UserFactory.
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement([User::TYPE_ADMIN, User::TYPE_USER]),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 'secret',
            'password_changed_at' => null,
            'remember_token' => Str::random(10),
            'active' => true,
        ];
    }

    /**
     * @return UserFactory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => User::TYPE_ADMIN,
            ];
        });
    }

    /**
     * @return UserFactory
     */
    public function user()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => User::TYPE_USER,
            ];
        });
    }

    /**
     * @return UserFactory
     */
    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'active' => true,
            ];
        });
    }

    /**
     * @return UserFactory
     */
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'active' => false,
            ];
        });
    }

    /**
     * @return UserFactory
     */
    public function confirmed()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => now(),
            ];
        });
    }

    /**
     * @return UserFactory
     */
    public function unconfirmed()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * @return UserFactory
     */
    public function passwordExpired()
    {
        return $this->state(function (array $attributes) {
            return [
                'password_changed_at' => now()->subYears(5),
            ];
        });
    }

    /**
     * @return UserFactory
     */
    public function deleted()
    {
        return $this->state(function (array $attributes) {
            return [
                'deleted_at' => now(),
            ];
        });
    }
}
