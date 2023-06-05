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
        Schema::create('user_stats', function(Blueprint $table) {
            $table->integer('id')->unsigned()->index();
            $table->char('user_uuid', 36);
            $table->foreign('user_uuid')->references('uuid')->on('users');
            $table->integer('games_played')->default(0);
            $table->integer('games_won')->default(0);
            $table->integer('games_lost')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_stats');
    }
};
