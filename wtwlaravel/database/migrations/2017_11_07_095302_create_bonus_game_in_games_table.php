<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusGamesInGamesTable extends Migration
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
            $table->unsignedInteger('bonusGameId')->nullable();
            $table->unsignedInteger('gameId')->nullable();
            $table->boolean('isCompleted')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
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
