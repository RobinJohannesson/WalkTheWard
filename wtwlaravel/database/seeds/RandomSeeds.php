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

        /*DB::table('bonus_games_in_games')->insert([
            'isCompleted' => true,
            'bonusGameId' => 1,
            'gameId' => 1,
        ]);*/

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

        DB::table('place_in_games')->insert([
            'placeId' => 1,
            'gameId' => 1,
            'numberOfStars' => 1,
        ]);

        /*DB::table('questions')->insert([
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

        DB::table('questions')->insert([
            'question' => "Svenska Deckarakademin delar varje år ut pris för bästa svenska och bästa översatt kriminallroman. Vad heter priset?",
            'answer1' => "Sherlock Holmes hatten",
            'answer2' => "Guldbatongen",
            'answer3' => "Den gyllene kofoten",
            'answer4' => "Den blodiga pennan",
            'correctAnswer' => 2,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 2,
        ]); */

        DB::table('questions')->insert([
            'question' => "Vilka av följande gräsarter kan användas för att anlägga en klippt gräsmatta?",
            'answer1' => "Tuvtåtel och Hakonegräs",
            'answer2' => "Blåsvingel och Lampborstgräs",
            'answer3' => "Rödsvingel och Ängsröe",
            'answer4' => "Hakonegräs och Lampborstgräs",
            'correctAnswer' => 3,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 1,
        ]);

        DB::table('questions')->insert([
            'question' => "När bör gamla äppelträd helst beskäras?",
            'answer1' => "Under JAS (juli, augusti, september)",
            'answer2' => "Under vårvintern",
            'answer3' => "När som helst på året",
            'answer4' => "December till februari",
            'correctAnswer' => 1,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 1,
        ]);

        DB::table('questions')->insert([
            'question' => "Idag förknippar vi ofta boxbom med kyrkogårdar, men boxbom är en mycket gammal kulturväxt som användes som medicinalväxt i klostren. Var har den sitt ursprung?",
            'answer1' => "Medelhavsländerna",
            'answer2' => "Östasien, Indien",
            'answer3' => "Sydamerika, Mexiko",
            'answer4' => "Nordafrika",
            'correctAnswer' => 2,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 1,
        ]);

        DB::table('questions')->insert([
            'question' => "Vad kan du tänka på när det är snö och is ute på vägarna?",
            'answer1' => "Att inte gå ut alls",
            'answer2' => "Att jag kan sätta broddar på skorna och isdubb på käppen",
            'answer3' => "Att det är bättre att pulsa i djupsnö än att gå på vägen",
            'answer4' => "Att gå försiktigt",
            'correctAnswer' => 2,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 2,
        ]);

        DB::table('questions')->insert([
            'question' => "Kalcium och D-vitamin behövs för att bygga upp och förhindra urkalkning av skelettet. Vilken mat innehåller mycket kalcium?",
            'answer1' => "Skinka och korv",
            'answer2' => "Mjukt och hårt bröd",
            'answer3' => "Mjölk, yoghurt och ost",
            'answer4' => "Kanelbullar, sockerkaka och veteskorpor",
            'correctAnswer' => 3,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 2,
        ]);

        DB::table('questions')->insert([
            'question' => "När man är äldre och blir sjuk är det viktigt att man får i sig tillräckligt med energi och protein. Näringen behövs för att man skall återhämta sig så fort som möjligt efter sjukdom. Vilket mellanmål innehåller mest energi?",
            'answer1' => "1 bit sockerkaka",
            'answer2' => "1 äpple",
            'answer3' => "1 digestivekex med milda, prästost och marmelad",
            'answer4' => "1 kardemummaskorpa",
            'correctAnswer' => 3,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 3,
        ]);

        DB::table('questions')->insert([
            'question' => "När aptiten är dålig är det viktigt att...",
            'answer1' => "Inte äta för ofta eftersom man ska bli så hungrig som möjligt inför måltid",
            'answer2' => "Äta 3-4 mellanmål om dagen. Välj frukt eller smörgåsrån - de mättar inte så mycket",
            'answer3' => "Äta 3-4 energirika mellanmål om dagen. Välj kex med dessertost, delikatessyoghurt, kräm med gräddmjölk eller nyponsoppa med biskvier och glass",
            'answer4' => "Småäta lite hela tiden",
            'correctAnswer' => 3,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 3,
        ]);

        DB::table('questions')->insert([
            'question' => "Malmö allmänna sjukhus anlades på Slottsgatan 22 mitt emot Kungsparken i Malmö, år 1857. Det blev snabbt för litet med sina 67 platser och behovet blev stort för ett nytt större sjukhus. Det nya Allmänna sjukhuset anlades på Södra Förstadsgatan längs med Malmö – Ystad järnvägen. Vilket år invigdes Allmänna sjukhuset?",
            'answer1' => "1867",
            'answer2' => "1896",
            'answer3' => "1908",
            'answer4' => "1930",
            'correctAnswer' => 2,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 4,
        ]);

        DB::table('questions')->insert([
            'question' => "Under 2014 döptes alla gatorna inom sjukhusområdet och en av gatorna fick namn efter den förste sjukhusdirektören. Vad hette han?",
            'answer1' => "Fritz Bauer",
            'answer2' => "Carl-Bertil Laurell",
            'answer3' => "Jan G Waldenström",
            'answer4' => "Helge B Wulff",
            'correctAnswer' => 1,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 4,
        ]);

/* ----------- Fråga där alla svar är korrekta! ----------
        DB::table('questions')->insert([
            'question' => "När och hur ofta ska du tvätta dina händer?",
            'answer1' => "När det är synlig smuts",
            'answer2' => "Varje gång jag varit på toaletten",
            'answer3' => "Innan jag lagar eller äter en måltid",
            'answer4' => "Det är bra att tvätta händerna ofta",
            'correctAnswer' => 0,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 5,
        ]);

        DB::table('questions')->insert([
            'question' => "Bakterierna vandrar fort och din motståndskraft är försvagad när du är sjuk och du kan lättare bli smittad. Hur kan du förebygga att bli smittad?",
            'answer1' => "Undvik att ta folk i händerna",
            'answer2' => "Håll rent omkring dig",
            'answer3' => "Desinfektera händerna ofta",
            'answer4' => "Tvätta händerna ofta",
            'correctAnswer' => 0,
            'imageSource' => str_random(10),
            'videoSource' => str_random(10),
            'themeId' => 5,
        ]);
        */

        DB::table('question_in_games')->insert([
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

        /*DB::table('themes')->insert([
            'name' => str_random(10),
            'isActive' => 0,
        ],
        [
            'name' => "Konst och Kultur",
            'isActive' => 1,
        ],
        [
            'name' => str_random(10),
            'isActive' => 1,
        ]);*/

        DB::table('themes')->insert(
        [
            'name' => "Trädgård",
            'isActive' => 1,
        ]);
        DB::table('themes')->insert(
        [
            'name' => "Fall",
            'isActive' => 1,
        ]);
        DB::table('themes')->insert(
        [
            'name' => "Kost",
            'isActive' => 1,
        ]);
        DB::table('themes')->insert(
        [
            'name' => "SUS i tiden",
            'isActive' => 1,
        ]);
        DB::table('themes')->insert(
        [
            'name' => "Rena händer",
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
