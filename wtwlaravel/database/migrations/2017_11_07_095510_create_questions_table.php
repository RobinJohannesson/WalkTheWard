<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question', 500);
            $table->string('answer1', 500);
            $table->string('answer2', 500);
            $table->string('answer3', 500);
            $table->string('answer4', 500);
            $table->integer('correctAnswer');
            $table->string('imageSource')->nullable();
            $table->string('videoSource')->nullable();
            $table->unsignedInteger('themeId')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('questions');
    }
}
