<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesInGamesTable extends Migration
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
            $table->unsignedInteger('placeId')->nullable();
            $table->unsignedInteger('gameId')->nullable();
            $table->integer('numberOfStars')->nullable();
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
        Schema::dropIfExists('place_in_games');
    }
}
