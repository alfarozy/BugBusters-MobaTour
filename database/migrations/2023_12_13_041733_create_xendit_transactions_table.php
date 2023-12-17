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
        Schema::create('xendit_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('xendit_transaction_id');
            $table->string('external_id');
            $table->string('user_id');
            $table->string('payment_method');
            $table->string('payment_channel')->nullable();
            $table->string('payment_destination')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->text('invoice_url')->nullable();
            $table->text('qr_string')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->bigInteger('amount');
            $table->bigInteger('paid_amount')->nullable();
            $table->string('bank')->nullable();
            $table->string('ewallet_type')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->string('payer_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('description')->nullable();
            $table->string('event')->nullable();
            $table->bigInteger('adjusted_received_amount')->nullable();
            $table->bigInteger('fees_paid_amount')->nullable();
            $table->string('failure_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xendit_transactions');
    }
};
