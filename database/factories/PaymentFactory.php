<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'subscription_id' => Subscription::factory(),
            'Amount_paid' => $this->faker->randomFloat(2, 10, 500),
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'cash']),
            'date' => $this->faker->date(),
        ];
    }
}
