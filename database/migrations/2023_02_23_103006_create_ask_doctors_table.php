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
        Schema::create('ask_doctors', function (Blueprint $table) {
            $table->id();
            $table->integer("doctor_id");
            $table->string("name");
            $table->string("phone");
            $table->string("email");
            $table->string("subject");
            $table->longText("message");
            $table->longText("reply")->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ask_doctors');
    }
};
