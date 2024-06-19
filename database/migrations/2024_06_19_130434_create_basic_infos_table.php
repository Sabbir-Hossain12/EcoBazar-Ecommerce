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
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('x_link')->nullable();
            $table->string('p_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->integer('inside_dhaka_charge')->nullable();
            $table->integer('outside_dhaka_charge')->nullable();

            $table->text('store_location')->nullable();
            $table->text('fb_pixel')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('chatbox_script')->nullable();
            $table->text('marquee_text')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_infos');
    }
};
