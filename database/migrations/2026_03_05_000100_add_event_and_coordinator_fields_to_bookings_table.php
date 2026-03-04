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
            $table->string('event_name')->nullable()->after('end_time');
            $table->string('event_department')->nullable()->after('event_name');
            $table->string('event_type')->nullable()->after('event_department');
            $table->string('coordinator_name')->nullable()->after('event_type');
            $table->string('coordinator_phone', 20)->nullable()->after('coordinator_name');
            $table->string('coordinator_department')->nullable()->after('coordinator_phone');
            $table->string('coordinator_email')->nullable()->after('coordinator_department');
            $table->string('coordinator_emergency_number', 20)->nullable()->after('coordinator_email');
            $table->json('media_requirements')->nullable()->after('coordinator_emergency_number');
            $table->text('media_requirements_other')->nullable()->after('media_requirements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'event_name',
                'event_department',
                'event_type',
                'coordinator_name',
                'coordinator_phone',
                'coordinator_department',
                'coordinator_email',
                'coordinator_emergency_number',
                'media_requirements',
                'media_requirements_other',
            ]);
        });
    }
};
