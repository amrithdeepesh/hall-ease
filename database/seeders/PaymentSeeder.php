<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some completed payments
        Payment::factory()
            ->completed()
            ->count(15)
            ->create();

        // Create some pending payments
        Payment::factory()
            ->pending()
            ->count(5)
            ->create();

        // Create some random payments
        Payment::factory()
            ->count(10)
            ->create();
    }
}
