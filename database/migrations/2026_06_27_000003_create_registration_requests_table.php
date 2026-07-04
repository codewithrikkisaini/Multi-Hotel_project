<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registration_requests', function (Blueprint $table) {
            $table->id();
            // Business Information
            $table->string('hotel_name');
            $table->string('business_registration_name');
            $table->string('contact_person');
            $table->string('designation');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->string('website')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postal_code');

            // Business Details
            $table->string('tax_id')->nullable();
            $table->string('vat')->nullable();
            $table->string('registration_number')->nullable();
            $table->integer('number_of_rooms');
            $table->integer('floors')->nullable();
            $table->string('property_type');
            $table->string('hotel_category');
            $table->string('current_pms')->nullable();
            $table->string('channel_manager')->nullable();

            // OTA
            $table->string('booking_com_url')->nullable();
            $table->string('airbnb_url')->nullable();
            $table->string('expedia_url')->nullable();

            // Payment
            $table->string('preferred_currency');

            $table->text('additional_notes')->nullable();

            $table->string('status')->default('Pending Approval');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registration_requests');
    }
};
