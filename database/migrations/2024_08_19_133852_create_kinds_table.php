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
        Schema::create('kinds', function (Blueprint $table) {
            $table->id();
            $table->string('name_kind');

            $table->timestamps();

            $table->foreignId('category_id');
            // $table->foreignId('game_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kinds');
    }
};
