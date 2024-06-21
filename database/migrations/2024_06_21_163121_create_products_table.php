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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->cascadeOnDelete();
            
            $table->string('product_name');
            $table->string('slug')->unique();
            
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            
            $table->text('short_desc')->nullable();
            
            $table->tinyInteger('isPopular')->default(0)->comment('1=active,0=inactive');
            $table->tinyInteger('isHot')->default(0)->comment('1=active,0=inactive');
            $table->tinyInteger('isFeatured')->default(0)->comment('1=active,0=inactive');
            
            $table->tinyInteger('status')->default(1)->comment('1=active,0=inactive');
            
            



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
