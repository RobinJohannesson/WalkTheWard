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
            $table->foreign('statisticId')->references('id')->on('statistics');
            $table->foreign('wardId')->references('id')->on('wards');
        });
        
        Schema::table('games', function (Blueprint $table){
            $table->foreign('areaId')->references('id')->on('areas');
            $table->foreign('themeId')->references('id')->on('themes');
        });
        
        Schema::table('places_in_games', function (Blueprint $table){
            $table->foreign('gameId')->references('id')->on('games');
            $table->foreign('placeId')->references('id')->on('places');
        });
        
        Schema::table('bonus_games_in_games', function (Blueprint $table){
            $table->foreign('bonusGameId')->references('id')->on('bonus_games');
            $table->foreign('gameId')->references('id')->on('games');
        });
        
        Schema::table('questions_in_games', function (Blueprint $table){
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
