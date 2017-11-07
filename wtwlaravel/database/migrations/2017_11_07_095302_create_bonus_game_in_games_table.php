<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusGameInGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_game_in_games', function (Blueprint $table) {
            $table->primary(['bonusGameId', 'gameId']);
            $table->unsignedInteger('bonusGameId');
            $table->unsignedInteger('gameId');
            $table->boolean('isCompleted');
            $table->foreign('bonusGamesId')->references('id')->on('bonus_games')->onDelete('cascade');
            $table->foreign('gameId')->references('id')->on('games')->onDelete('cascade');
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
        Schema::dropIfExists('bonus_game_in_games');
    }
}
