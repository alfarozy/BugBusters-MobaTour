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
        Schema::create('user_tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('tournament_id');
            $table->string('code');
            $table->string('team_name');
            $table->string('whatsapp');
            $table->string('player_captain_nickname');
            $table->string('player_captain_id');
            $table->string('player_2_nickname');
            $table->string('player_2_id');
            $table->string('player_3_nickname');
            $table->string('player_3_id');
            $table->string('player_4_nickname');
            $table->string('player_4_id');
            $table->string('player_5_nickname');
            $table->string('player_5_id');
            $table->string('player_alternative_nickname')->nullable();
            $table->string('player_alternative_id')->nullable();
            $table->enum('status', ['active', 'pending', 'cancel'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tournaments');
    }
};
