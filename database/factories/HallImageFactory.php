<?php

namespace Database\Factories;

use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HallImage>
 */
class HallImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hall_id' => Hall::inRandomOrder()->first()?->id ?? Hall::factory(),
            'image_path' => 'halls/' . fake()->uuid() . '.jpg',
        ];
    }
}
