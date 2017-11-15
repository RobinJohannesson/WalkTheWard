<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('age');
            $table->string('gender');
            $table->integer('roomType');
            $table->integer('distanceInMeter')->default(0);
            $table->unsignedInteger('gameId')->nullable();
            $table->unsignedInteger('characterId')->nullable();
            $table->unsignedInteger('statisticId')->nullable();
            $table->unsignedInteger('wardId')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
