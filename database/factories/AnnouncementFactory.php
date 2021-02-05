<?php

namespace Database\Factories;

use App\Domains\Announcement\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class AnnouncementFactory.
 */
class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'area' => $this->faker->randomElement(['frontend', 'backend']),
            'type' => $this->faker->randomElement(['info', 'danger', 'warning', 'success']),
            'message' => $this->faker->text,
            'enabled' => $this->faker->boolean,
            'starts_at' => $this->faker->dateTime(),
            'ends_at' => $this->faker->dateTime(),
        ];
    }

    /**
     * @return AnnouncementFactory
     */
    public function enabled()
    {
        return $this->state(function (array $attributes) {
            return [
                'enabled' => true,
            ];
        });
    }

    /**
     * @return AnnouncementFactory
     */
    public function disabled()
    {
        return $this->state(function (array $attributes) {
            return [
                'enabled' => false,
            ];
        });
    }

    /**
     * @return AnnouncementFactory
     */
    public function frontend()
    {
        return $this->state(function (array $attributes) {
            return [
                'area' => 'frontend',
            ];
        });
    }

    /**
     * @return AnnouncementFactory
     */
    public function backend()
    {
        return $this->state(function (array $attributes) {
            return [
                'area' => 'backend',
            ];
        });
    }

    /**
     * @return AnnouncementFactory
     */
    public function global()
    {
        return $this->state(function (array $attributes) {
            return [
                'area' => null,
            ];
        });
    }

    /**
     * @return AnnouncementFactory
     */
    public function noDates()
    {
        return $this->state(function (array $attributes) {
            return [
                'starts_at' => null,
                'ends_at' => null,
            ];
        });
    }

    /**
     * @return AnnouncementFactory
     */
    public function insideDateRange()
    {
        return $this->state(function (array $attributes) {
            return [
                'starts_at' => now()->subWeek(),
                'ends_at' => now()->addWeek(),
            ];
        });
    }

    /**
     * @return AnnouncementFactory
     */
    public function outsideDateRange()
    {
        return $this->state(function (array $attributes) {
            return [
                'starts_at' => now()->subWeeks(2),
                'ends_at' => now()->subWeek(),
            ];
        });
    }
}
