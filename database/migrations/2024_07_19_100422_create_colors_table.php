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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attrvalue_id')->constrained();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('color_title');
            $table->decimal('productRegularPrice',10,2)->nullable();
            $table->decimal('productSalePrice',10,2);
            $table->integer('discount_percentage')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
