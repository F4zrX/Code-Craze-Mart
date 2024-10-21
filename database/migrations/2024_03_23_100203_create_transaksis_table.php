<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Nullable
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('game_id')->nullable(); // Nullable
            $table->foreign('game_id')->references('id')->on('games')->onDelete('set null');
            $table->string('snap_token')->default(''); // Default value added
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Removing these lines as the foreign keys were already dropped in the up() method
            // $table->dropForeign(['user_id']);
            // $table->dropForeign(['game_id']);
        });
        
        Schema::dropIfExists('transaksis');
    }
}
