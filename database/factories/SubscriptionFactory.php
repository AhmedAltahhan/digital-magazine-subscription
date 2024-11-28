<?php

namespace Database\Factories;

use App\Models\Magazine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'magazine_id' => Magazine::factory(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'),
            'status' => $this->faker->randomElement([0, 1, 3]),
        ];
    }
}
