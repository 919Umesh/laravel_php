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
        Schema::create('location', function (Blueprint $table) { // Fixed: Table name should be plural (`locations`)
            $table->id();
            $table->string('country'); // Country field
            $table->text('district')->nullable(); // District field
            $table->string('village'); // Fixed: Changed `decimal` to `string` for village
            $table->string('image_url')->nullable(); // Image URL field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location'); // Fixed: Table name should be plural (`locations`)
    }
};