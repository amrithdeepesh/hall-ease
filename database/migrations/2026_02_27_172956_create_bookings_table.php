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
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            // Hall reference
            $table->foreignId('hall_id')
                ->constrained()
                ->cascadeOnDelete();

            // Customer who booked
            $table->foreignId('customer_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Admin/Staff who created booking
            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnDelete();

            // Event details
            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time');

            // Pricing
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->decimal('advance_amount', 10, 2)->default(0);

            // Booking status
            $table->enum('booking_status', [
                'pending',
                'confirmed',
                'cancelled',
                'completed'
            ])->default('pending');

            // Payment status
            $table->enum('payment_status', [
                'unpaid',
                'partial',
                'paid'
            ])->default('unpaid');

            // Optional cancellation reason
            $table->text('cancellation_reason')->nullable();

            $table->timestamps();

            // 🔥 Performance indexes
            $table->index(['hall_id', 'event_date']);
            $table->index(['customer_id']);
            $table->index(['booking_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};