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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('customer_id')->constrained();
            
           
            $table->string('invoiceID');
            $table->string('payment_method')->nullable();
            $table->integer('payment_amount')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('order_status')->nullable();
            $table->string('currency')->default('BDT');
            $table->integer('shipping_charge');
            $table->integer('tax')->nullable();
            
            $table->text('order_note')->nullable();
            
            $table->integer('subtotal');
            $table->string('discount_amount')->nullable();
            $table->integer('total');
            
            $table->date('order_date');
            $table->date('delivery_date')->nullable();
            $table->date('complete_date')->nullable();
            
            $table->integer('admin_id')->nullable();
            $table->integer('coupon_id')->nullable();
            
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
