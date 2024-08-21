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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nb_players');
            $table->string('place');
            $table->date('date_event');
            $table->time('hour_event');
            $table->text('description_event');

            $table->timestamps();

            $table->foreignId('user_id');
            $table->foreignId('address_id');
            $table->foreignId('game_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
