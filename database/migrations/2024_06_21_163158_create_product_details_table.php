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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            
            $table->string('SKU')->nullable();
            $table->decimal('regular_price')->nullable();
            $table->string('sale_price');
            $table->string('discount')->nullable();
            $table->longText('long_desc')->nullable();
            
            $table->integer('total_qty')->nullable();
            $table->integer('available_qty')->nullable();
            $table->integer('sold_qty')->nullable();
            
            $table->text('youtube_embed_link')->nullable();
            
            $table->text('productThumbnail_img');
            $table->text('product_img')->nullable();
         
            
            $table->string('meta_title')->nullable();
            $table->string('meta_key')->nullable();
            $table->text('meta_desc')->nullable();
            
            
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
