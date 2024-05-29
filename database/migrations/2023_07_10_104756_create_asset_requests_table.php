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
        Schema::create('asset_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->integer('quantity');
            $table->string('current_stock')->nullable(null);
            $table->string('requestfor')->nullable(null);
            $table->string('location')->nullable(null);
            $table->string('department')->nullable(null);
            $table->date('date')->nullable(null);
            $table->string('purpose')->nullable(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_requests');
    }
};
