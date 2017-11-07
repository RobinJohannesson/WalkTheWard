<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('letterToDiscard');
            $table->string('imageSource');
            $table->integer('placeId')->unsigned;
            $table->timestamps();
            $table->foreign('placeId')->references('id')->on('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus_games');
    }
}
