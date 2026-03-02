<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = fake()->time('H:i:s');
        $eventDate = fake()->dateTimeBetween('+2 days', '+60 days');

        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'hall_id' => Hall::inRandomOrder()->first()?->id ?? Hall::factory(),
            'event_date' => $eventDate,
            'start_time' => $startTime,
            'end_time' => date('H:i:s', strtotime('+6 hours', strtotime($startTime))),
            'total_amount' => fake()->numberBetween(50000, 300000),
            'booking_status' => fake()->randomElement(['pending', 'confirmed', 'cancelled']),
            'payment_status' => fake()->randomElement(['unpaid', 'paid']),
        ];
    }

    /**
     * Indicate that the booking is confirmed.
     */
    public function confirmed(): static
    {
        return $this->state(fn (array $attributes) => [
            'booking_status' => 'confirmed',
            'payment_status' => 'paid',
        ]);
    }

    /**
     * Indicate that the booking is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'booking_status' => 'pending',
            'payment_status' => 'unpaid',
        ]);
    }
}
