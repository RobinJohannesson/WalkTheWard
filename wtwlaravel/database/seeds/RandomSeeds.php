<?php

use Illuminate\Database\Seeder;

class RandomSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('areas')->insert([
            'name' => str_random(10),
            'mapId' => 1,
        ]);

        DB::table('bonus_games')->insert([
            'lettersToDiscard' => str_random(10),
            'imageSource' => str_random(10),
            'placeId' => 1,
        ]);

        DB::table('bonus_games_in_games')->insert([
            'isCompleted' => true,
            'bonusGameId' => 1,
            'gameId' => 1,
        ]);

        DB::table('characters')->insert([
            'name' => str_random(10),
            'imageSource' => str_random(10),
        ]);

        DB::table('games')->insert([
            'areaId' => 1,
            'themeId' => 1,
        ]);

        DB::table('maps')->insert([
            'name' => str_random(10),
        ]);

        DB::table('patients')->insert([
            'age' => 18,
            'gender' => "Female",
            'roomType' => 1,
            'distanceInMeter' => 1000,
            'gameId' => 1,
            'characterId' => 1,
            'statisticId' => 1,
            'wardId' => 1,
        ]);

        DB::table('places')->insert([
            'name' => str_random(10),
            'description' => str_random(10),
            'stationId' => 1,
            'areaId' => 1,
        ]);

        DB::table('places_in_games')->insert([
            'placeId' => 1,
            'gameId' => 1,
            'numberOfStars' => 1,
        ]);

        DB::table('questions')->insert([
            'question' => str_random(10),
            'answer1' => str_random(10),
            'answer2' => str_random(10),
            'answer3' => str_random(10),
            'answer4' => str_random(10),
            'correctAnswer' => 4,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 1,
        ]);

        DB::table('questions_in_games')->insert([
            'questionId' => 1,
            'gameId' => 1,
            'isAnswered' => 1,
        ]);

        DB::table('stations')->insert([
            'imageSource' => str_random(10),
            'wardId' => 1,
        ]);

        DB::table('statistics')->insert([
            'hasGoneHome' => 1,
            'dayAmount' => 2,
            'wasEasyToPlay' => 1,
        ]);

        DB::table('themes')->insert([
            'name' => str_random(10),
            'isActive' => 0,
        ],
        [
            'name' => str_random(10),
            'isActive' => 1,
        ],
        [
            'name' => str_random(10),
            'isActive' => 1,
        ]);


        DB::table('wards')->insert([
            'name' => str_random(10),
            'address' => str_random(10),
            'description' => str_random(10),
            'imageSource' => str_random(10),
        ]);

        Schema::enableForeignKeyConstraints();


    }
}
