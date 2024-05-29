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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctorID');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('gender');
            $table->string('phone1');
            $table->string('ext1');
            $table->string('phone2');
            $table->string('ext2');
            $table->string('education');
            $table->string('address');
            $table->string('biographical_sketch');
            $table->string('education_fellowship');
            $table->string('speciality_interests');
            $table->string('research_publications');
            $table->string('professional_memberships:');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
