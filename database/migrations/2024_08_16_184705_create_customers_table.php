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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('company name')->nullable();
            $table->text('address_1');
            $table->text('address_2')->nullable();
            $table->string('state_district');
            $table->string('zip');
            $table->string('country')->default('Bangladesh');
            $table->string('phone');
            $table->string('email');
            
            $table->tinyInteger('status')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
