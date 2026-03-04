<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hall>
 */
class HallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hallNames = [
            'Grand Ballroom',
            'Emerald Hall',
            'Crystal Palace',
            'Royal Chambers',
            'Sunset Pavilion',
            'Heritage Hall',
            'Modern Venue',
            'Lakeside Convention',
            'Downtown Events',
            'Riverside Banquet',
        ];

        return [
            'name' => fake()->randomElement($hallNames),
            'location' => fake()->city() . ', ' . fake()->state(),
            'capacity' => fake()->randomElement([50, 100, 150, 200, 300, 500]),
            'description' => fake()->paragraph(3),
            'image' => fake()->imageUrl(400, 300, 'halls', true, 'Hall'),
            'status' => fake()->randomElement(['available', 'maintenance']),
        ];
    }
}
