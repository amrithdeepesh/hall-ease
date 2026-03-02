<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some confirmed bookings
        Booking::factory()
            ->confirmed()
            ->count(10)
            ->create();

        // Create some pending bookings
        Booking::factory()
            ->pending()
            ->count(8)
            ->create();

        // Create some random bookings
        Booking::factory()
            ->count(12)
            ->create();
    }
}
