<?php

namespace Database\Factories;

use App\Models\Booking;
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
            'booking_id' => Booking::inRandomOrder()->first()?->id ?? Booking::factory(),
            'amount' => fake()->numberBetween(50000, 300000),
            'payment_method' => fake()->randomElement(['credit_card', 'debit_card', 'bank_transfer', 'wallet']),
            'transaction_id' => fake()->uuid(),
            'payment_date' => fake()->dateTimeBetween('-30 days', 'now'),
            'payment_status' => fake()->randomElement(['pending', 'completed', 'failed']),
        ];
    }

    /**
     * Indicate that the payment is completed.
     */
    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'payment_status' => 'completed',
            'payment_date' => now(),
        ]);
    }

    /**
     * Indicate that the payment is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'payment_status' => 'pending',
            'payment_date' => null,
        ]);
    }
}
