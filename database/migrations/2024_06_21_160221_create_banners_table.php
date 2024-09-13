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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->text('banner_img')->nullable();
            $table->text('banner_link')->nullable();
            $table->string('banner_type')->comment('small,medium,large')->default('small');
            $table->string('banner_title_1')->nullable();
            $table->string('banner_title_2')->nullable();
            $table->string('banner_title_3')->nullable();
           
            $table->string('banner_btn_name')->nullable();
            $table->text('banner_btn_link')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1=active,0=inactive');
            
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
