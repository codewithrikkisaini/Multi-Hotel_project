<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tables = [
            'users', 'rooms', 'room_types', 'guests', 'reservations',
            'invoices', 'payments', 'housekeeping', 'maintenance_tickets', 'settings'
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                Schema::table($table, function (Blueprint $blueprint) use ($table) {
                    if (!Schema::hasColumn($table, 'hotel_id')) {
                        $blueprint->foreignId('hotel_id')->nullable()->constrained('hotels')->cascadeOnDelete();
                    }
                });
            }
        }
    }

    public function down(): void
    {
        $tables = [
            'users', 'rooms', 'room_types', 'guests', 'reservations',
            'invoices', 'payments', 'housekeeping', 'maintenance_tickets', 'settings'
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'hotel_id')) {
                Schema::table($table, function (Blueprint $blueprint) {
                    $blueprint->dropForeign(['hotel_id']);
                    $blueprint->dropColumn('hotel_id');
                });
            }
        }
    }
};
