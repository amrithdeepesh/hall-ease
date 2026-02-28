<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('hall_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->decimal('total_amount', 10, 2)->default(0);

            $table->enum('booking_status', [
                'pending',
                'confirmed',
                'cancelled'
            ])->default('pending');

            $table->enum('payment_status', [
                'unpaid',
                'paid'
            ])->default('unpaid');

            $table->timestamps();

            // 🔥 important index for fast availability check
            $table->index(['hall_id', 'event_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};