<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Character;
use App\Game;
use App\Place;
use App\Place_in_game;
use App\Area;
use App\Theme;
use App\Question;
use App\Question_in_game;
use App\Map;
use App\Bonus_game;
use App\Bonus_game_in_game;
use App\Http\Controllers\Cookie;

class BonusController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request, $id)
    {
        // Hämtar bonus_game Id
        $bonusGameId = $id;
        $bonusGame = Bonus_game::find($bonusGameId);
        // hämtar bildnamnet
        $bonusGameImageSource = $bonusGame->imageSource;
        // ex. helsingborg eller lund
        $bonusGameLettersDB = $bonusGame->lettersToDiscard;
        // Gör bokstäverna stora
        $bonusGameLetters = mb_strToUpper($bonusGameLettersDB);

        // Om de är färre än 5, skapar strängar
        if (mb_strlen($bonusGameLetters) <= 5) {
            // lund
            $bonusGameLettersShuffledCut = $bonusGameLetters;
            // _ _ _ _ (utan mellanslag)
            $bonusGameLettersRemain = str_repeat("_",mb_strlen($bonusGameLetters));
        }

        // Kollar om staden innehåller fler än 5 bokstäver
        if (mb_strlen($bonusGameLetters) > 5) {
            // Slumpar runt bokstäverna
            // ex. hligogesnbr (helsingborg)
            // $bonusGameLettersShuffled = str_shuffle($bonusGameLetters);
            $string = $bonusGameLetters;
            $len = mb_strlen($string);
            $sploded = array();
            while($len-- > 0) { $sploded[] = mb_substr($string, $len, 1); }
            shuffle($sploded);
            $bonusGameLettersShuffled = join('', $sploded);
            // ex. esnbr (5 slumpmässiga bokstäver från helsingborg)
            $bonusGameLettersShuffledCut = mb_substr($bonusGameLettersShuffled, 0, 5);

            // ex. helsingborg
            $bonusGameLettersRemain = $bonusGameLetters;
            // Counter
            $fiveTimes = 0;
            // Ersätter alla bokstäver som ska användas till spelet till "_"
            while ($fiveTimes < 5) {
                // $bonusGameLettersRemain = str_replace($bonusGameLettersShuffledCut[$fiveTimes],"_",$bonusGameLettersRemain);
                $bonusGameLettersRemain = implode("_", mb_split($bonusGameLettersShuffledCut[$fiveTimes], $bonusGameLettersRemain));
                $fiveTimes ++;
            }
        }
        // Tar fram längden av bokstäver som ska användas för bilden bokstäverna
        $whileBonusUnder12Int = mb_strlen($bonusGameLettersShuffledCut);
        // Fyller ut till 12 bokstäver med slumpmässigt mellan a-ö
        while ( $whileBonusUnder12Int < 12) {
            $charRand = chr(rand(65,90));
            if(mb_strpos($bonusGameLettersShuffledCut, $charRand) === false){
                $bonusGameLettersShuffledCut .=  $charRand;
                $whileBonusUnder12Int ++;
            }
        }

        // Slumpar runt bokstäverna
        $string = $bonusGameLettersShuffledCut;
        $len = mb_strlen($string);
        $sploded = array();
        while($len-- > 0) { $sploded[] = mb_substr($string, $len, 1); }
        shuffle($sploded);
        $bonusGameLettersShuffled = join('', $sploded);
        // Gör alla bokstäver små
        $bonusGameLettersShuffledUpper = mb_strToUpper($bonusGameLettersShuffled);
        // Skapar en lista av bokstäverna
        // $bonusGameLettersArray = mb_split("UTF-8", $bonusGameLettersShuffledUpper);
        $bonusGameLettersArray = preg_split('//u', $bonusGameLettersShuffledUpper, -1, PREG_SPLIT_NO_EMPTY);
        // Skapar en lista av återstående bokstäver
        // $bonusGameLettersShuffledRestArray = mb_split("UTF-8", $bonusGameLettersRemain);
        $bonusGameLettersShuffledRestArray = preg_split('//u', $bonusGameLettersRemain, null, PREG_SPLIT_NO_EMPTY);

        // Hämta PatientId från cookie
        $patientId = $request->cookie('patientId');
        // Hämtar Patient från patientId
        $patient = Patient::find($patientId);
        // Hämtar currentAreaId
        $areaId = $patient->game->area->id;
        // Hämta GameId från Patient
        $gameId = $patient->game->id;

        // Hämtar en lista med alla places för specifik area
        $placeIdArray = Place::where('areaId', $areaId)->pluck('id')->toArray();
        $placeActiveRoundArray = "";
        $placeTempObject = collect();
        foreach ($placeIdArray as $placeIdInList) {
            // Hämtar en lista av gameId och areaId alla activeRound
            $placeTempObject->push(Place_in_game::where(['placeId' => $placeIdInList, 'gameId' => $gameId])->get());
        }
        $placeActiveRoundArraytest = $placeTempObject->flatten();

        // Räknar antal städer i area med activeRound == 1
        $countActiveRound = 0;
        foreach ($placeActiveRoundArraytest as $activeRound) {
            if ($activeRound['activeRound'] == 0) {
                $countActiveRound++;
            }
        }
        // Räknar antal id för att se hur många stationer där finns totalt
        $placeIdAmount = count($placeIdArray);
        // Skapar en bool för att senare användas för att kontrollera om användaren är klar med alla stationer för area
        $placeInGameBool = false;
        if ($countActiveRound == $placeIdAmount) {
            // Skapar variabel om användaren svarat på alla stationer
            $placeInGameBool = true;
        }

        // Kollar om användaren besökt alla städer
        if ($placeInGameBool == true) {
            $bonusUrl = "/gameHome";
        }
        if ($placeInGameBool == false) {
            $bonusUrl = "/scan";
        }

        return view('bonus', compact(["bonusGameLettersArray", "bonusGameLettersShuffledRestArray", "bonusGameLetters", "bonusGameImageSource", "bonusUrl"]));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // $isCompletedValue = $request->isCompletedValue;
        // $bonusGameId = $request->bonusGameid;
        // $bonusGame = BonusGame::find($bonusGameId);
        // $BonusGameInGame = BonusGameInGame::where("gameId", "=", $request->gameId)->first();
        // $BonusGameInGame->bonusGameId = $request->bonusGameId;
        // $BonusGameInGame->isCompleted = 1;
        // $BonusGameInGame->save();
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
