<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceInGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_in_games', function (Blueprint $table) {
            $table->primary(['placeId', 'gameId']);
            $table->unsignedInteger('placeId');
            $table->unsignedInteger('gameId');
            $table->integer('numberOfStars');
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
        Schema::dropIfExists('place_in_games');
    }
}
