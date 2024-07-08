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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('slug')->unique();
            $table->text('category_img')->nullable();
            $table->text('category_img_path')->nullable();
            $table->tinyInteger('front_status')->default(0)->comment('1=active,0=inactive');
            $table->tinyInteger('topCategory_status')->default(0)->comment('1=active,0=inactive');
            $table->tinyInteger('status')->default(1)->comment('1=active,0=inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
