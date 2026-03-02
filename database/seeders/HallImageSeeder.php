<?php

namespace Database\Seeders;

use App\Models\HallImage;
use App\Models\Hall;
use Illuminate\Database\Seeder;

class HallImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add 3-5 images for each hall
        Hall::all()->each(function ($hall) {
            HallImage::factory()
                ->count(fake()->numberBetween(3, 5))
                ->for($hall)
                ->create();
        });
    }
}
