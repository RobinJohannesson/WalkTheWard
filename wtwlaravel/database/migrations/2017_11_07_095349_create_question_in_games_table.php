<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionInGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_in_games', function (Blueprint $table) {
            $table->primary(['questionId', 'gameId']);
            $table->unsignedInteger('questionId')->nullable();
            $table->unsignedInteger('gameId')->nullable();
            $table->boolean('isAnswered')->nullable();
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
        Schema::dropIfExists('question_in_games');
    }
}
