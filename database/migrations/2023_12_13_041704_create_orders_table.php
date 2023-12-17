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
            $table->foreignId('user_id');
            $table->foreignId('tournament_id');
            $table->foreignId('member_tournament_id');
            $table->string('invoice');
            $table->double('price');
            $table->dateTime('order_date');
            $table->dateTime('expired_date');
            $table->dateTime('payment_date');
            $table->dateTime('invoice_url');
            $table->enum('status', ['UNCONFIRMED', 'IN_CONFIRMATION', 'PAYMENT_ACCEPTED', 'PAYMENT_REJECTED', 'EXPIRED', 'CANCELLED'])->default("UNCONFIRMED");
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
