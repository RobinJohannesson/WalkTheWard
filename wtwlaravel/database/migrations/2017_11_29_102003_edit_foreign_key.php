<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table){
            $table->foreign('gameId')->references('id')->on('games');
            $table->foreign('characterId')->references('id')->on('characters');
            // $table->foreign('statisticId')->references('id')->on('statistics');
            $table->foreign('wardId')->references('id')->on('wards');
        });

        Schema::table('statistics', function (Blueprint $table){
            $table->foreign('patientId')->references('id')->on('patients');
        });

        Schema::table('games', function (Blueprint $table){
            $table->foreign('areaId')->references('id')->on('areas');
            $table->foreign('themeId')->references('id')->on('themes');
        });

        Schema::table('place_in_games', function (Blueprint $table){
            $table->foreign('gameId')->references('id')->on('games');
            $table->foreign('placeId')->references('id')->on('places');
        });

        Schema::table('bonus_game_in_games', function (Blueprint $table){
            $table->foreign('bonusGameId')->references('id')->on('bonus_games');
            $table->foreign('gameId')->references('id')->on('games');
        });

        Schema::table('question_in_games', function (Blueprint $table){
            $table->foreign('questionId')->references('id')->on('questions');
            $table->foreign('gameId')->references('id')->on('games');
        });

        Schema::table('questions', function (Blueprint $table){
            $table->foreign('themeId')->references('id')->on('themes');
        });

        Schema::table('bonus_games', function (Blueprint $table){
            $table->foreign('placeId')->references('id')->on('places');
        });

        Schema::table('stations', function (Blueprint $table){
            $table->foreign('wardId')->references('id')->on('wards');
        });

        Schema::table('areas', function (Blueprint $table){
            $table->foreign('mapId')->references('id')->on('maps');
        });

        Schema::table('places', function (Blueprint $table){
            $table->foreign('stationId')->references('id')->on('stations');
            $table->foreign('areaId')->references('id')->on('areas');
        });

        Schema::table('exercises_in_games', function (Blueprint $table){
            $table->foreign('gameId')->references('id')->on('games');
            $table->foreign('exerciseId')->references('id')->on('exercises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
