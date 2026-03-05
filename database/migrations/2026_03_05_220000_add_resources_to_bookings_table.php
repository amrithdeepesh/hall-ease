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
            if (!Schema::hasColumn('bookings', 'resources')) {
                $table->json('resources')->nullable()->after('media_requirements_other');
            }

            if (!Schema::hasColumn('bookings', 'resources_other')) {
                $table->text('resources_other')->nullable()->after('resources');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'resources_other')) {
                $table->dropColumn('resources_other');
            }

            if (Schema::hasColumn('bookings', 'resources')) {
                $table->dropColumn('resources');
            }
        });
    }
};
