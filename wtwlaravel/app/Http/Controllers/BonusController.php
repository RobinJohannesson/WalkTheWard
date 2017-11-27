<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bonus_game;

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
        // ex. helsingborg eller lund
        $bonusGameLettersDB = $bonusGame->lettersToDiscard;
        // Gör bokstäverna stora
        $bonusGameLetters = strToUpper($bonusGameLettersDB);

        // Om de är färre än 5, skapar strängar
        if (strlen($bonusGameLetters) <= 5) {
            // lund
            $bonusGameLettersShuffledCut = $bonusGameLetters;
            // _ _ _ _ (utan mellanslag)
            $bonusGameLettersRemain = str_repeat("_",strlen($bonusGameLetters));
        }

        // Kollar om staden innehåller fler än 5 bokstäver
        if (strlen($bonusGameLetters) > 5) {
            // Slumpar runt bokstäverna
            // ex. hligogesnbr (helsingborg)
            $bonusGameLettersShuffled = str_shuffle($bonusGameLetters);
            // ex. esnbr (5 slumpmässiga bokstäver från helsingborg)
            $bonusGameLettersShuffledCut = substr($bonusGameLettersShuffled, 0, 5);

            // ex. helsingborg
            $bonusGameLettersRemain = $bonusGameLetters;
            // Counter
            $fiveTimes = 0;
            // Ersätter alla bokstäver som ska användas till spelet till "_"
            while ($fiveTimes < 5) {
                $bonusGameLettersRemain = str_replace($bonusGameLettersShuffledCut[$fiveTimes],"_",$bonusGameLettersRemain);
                $fiveTimes ++;
            }
        }
        // Tar fram längden av bokstäver som ska användas för bilden bokstäverna
        $whileBonusUnder12Int = strlen($bonusGameLettersShuffledCut);
        // Fyller ut till 12 bokstäver med slumpmässigt mellan a-ö
        while ( $whileBonusUnder12Int < 12) {
            $charRand = chr(rand(65,90));
            if(strpos($bonusGameLettersShuffledCut, $charRand) === false){
                $bonusGameLettersShuffledCut .=  $charRand;
                $whileBonusUnder12Int ++;
            }
        }

        $test = $whileBonusUnder12Int;
        // Slumpar runt bokstäverna
        $bonusGameLettersShuffled = str_shuffle($bonusGameLettersShuffledCut);
        // Gör alla bokstäver små
        $bonusGameLettersShuffledUpper = strToUpper($bonusGameLettersShuffled);
        // Skapar en lista av bokstäverna
        $bonusGameLettersArray = str_split($bonusGameLettersShuffledUpper);
        // Skapar en lista av återstående bokstäver
        $bonusGameLettersShuffledRestArray = str_split($bonusGameLettersRemain);

        return view('bonus_screen', compact(["bonusGameLettersArray", "bonusGameLettersShuffledRestArray", "bonusGameLetters", "test"]));
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
        $BonusGameInGame = BonusGameInGame::where("gameId", "=", $request->gameId)->first();
        $BonusGameInGame->isCompleted = $request->bonusGameid;
        $BonusGameInGame->save();
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
