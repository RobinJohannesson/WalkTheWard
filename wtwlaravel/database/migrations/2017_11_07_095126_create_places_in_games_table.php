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
        Schema::create('places_in_games', function (Blueprint $table) {
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
        Schema::dropIfExists('places_in_games');
    }
}
