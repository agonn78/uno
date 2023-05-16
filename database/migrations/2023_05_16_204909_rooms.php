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
        Schema::table('rooms', function(Blueprint $table) {
            $table->integer('id')->unsigned()->index();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->date('created_at')->default(now());
            $table->integer('max_players')->default(4);
            $table->integer('current_players')->default(0);
            $table->enum('status', ['open', 'close'])->default('open');
            $table->string('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
