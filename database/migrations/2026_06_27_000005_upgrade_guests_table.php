<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            if (!Schema::hasColumn('guests', 'nationality')) {
                $table->string('nationality')->nullable();
                $table->string('passport_number')->nullable();
                $table->boolean('is_repeat_guest')->default(false);
                $table->string('booking_source')->nullable(); // OTA, Direct, Walk-in
                $table->text('guest_history')->nullable(); // JSON or text
            }
        });
    }

    public function down(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            $columns = ['nationality', 'passport_number', 'is_repeat_guest', 'booking_source', 'guest_history'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('guests', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
