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
        Schema::create('bonus_games_in_games', function (Blueprint $table) {
            $table->primary(['bonusGameId', 'gameId']);
            $table->unsignedInteger('bonusGameId');
            $table->unsignedInteger('gameId');
            $table->boolean('isCompleted');
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
        Schema::dropIfExists('bonus_games_in_games');
    }
}
