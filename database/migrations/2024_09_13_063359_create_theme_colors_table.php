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
        Schema::create('theme_colors', function (Blueprint $table) {
            $table->id();
            $table->string('primary_color_key')->nullable();
            $table->string('primary_color_value')->nullable();
            $table->string('secondary_color_key')->nullable();
            $table->string('secondary_color_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_colors');
    }
};
