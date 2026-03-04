<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['total_amount', 'booking_status', 'payment_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('total_amount', 10, 2)->default(0)->after('end_time');
            $table->enum('booking_status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending')->after('total_amount');
            $table->enum('payment_status', ['unpaid', 'partial', 'paid'])->default('unpaid')->after('booking_status');
        });
    }
};
