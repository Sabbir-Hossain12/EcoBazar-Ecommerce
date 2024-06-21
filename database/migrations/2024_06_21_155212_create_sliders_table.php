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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->text('slider_img')->nullable();
            $table->string('slider_title_1')->nullable();
            $table->string('slider_title_2')->nullable();
            $table->string('slider_title_3')->nullable();
            $table->text('slider_text')->nullable();
            $table->string('slider_btn_name')->nullable();
            $table->string('slider_btn_link')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1=active,0=inactive');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
