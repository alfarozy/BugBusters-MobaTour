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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id');
            $table->string('title');
            $table->string('slug');
            $table->string('thumbnails');
            $table->text('description');
            $table->integer('slot');
            $table->enum('type', ['free', 'premium'])->default('free');
            $table->double('price')->nullable();
            $table->enum('mode', ['single', 'double', 'group'])->default('single');
            $table->timestamp('schedule_date');
            $table->timestamp('end_register_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
