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
        Schema::create('booked_appointments', function (Blueprint $table) {
            $table->id('booking_id');
            $table->integer('slot_id');
            $table->integer('patient_id');
            $table->string('mode');
            $table->string('platform')->nullable();
            $table->string('id_number')->nullable();
            $table->string('identity_no')->nullable();
            $table->string('passport_date')->nullable();
            $table->integer('consultation_type')->nullable();
            $table->string('appointment_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_appointments');
    }
};
