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
        $bonusGameLetters = $bonusGame->lettersToDiscard;

        // Om de är färre än 5, skapar strängar
        if (strlen($bonusGameLetters) <= 5) {
            $bonusGameLettersShuffledCut = $bonusGameLetters;
            $bonusGameLettersRemain = str_repeat("_",strlen($bonusGameLetters));
        }

        // Kollar om staden innehåller fler än 5 bokstäver
        if (strlen($bonusGameLetters) > 5) {
            // Slumpar runt bokstäverna
            $bonusGameLettersShuffled = str_shuffle($bonusGameLetters);
            // hämtar 5 bokstäver från staden
            $bonusGameLettersShuffledCut = substr($bonusGameLettersShuffled, 0, 5);
            $fiveTimes = 0;
            $bonusGameLettersRemain = $bonusGameLetters;
            // Ersätter alla bokstäver som ska användas till spelet till "_"
            while ($fiveTimes < 5) {
                $bonusGameLettersRemain = str_replace($bonusGameLettersShuffledCut[$fiveTimes],"_",$bonusGameLettersRemain);
                $fiveTimes ++;
            }
        }
        $whileBonusUnder12Int = strlen($bonusGameLettersShuffledCut);
        // Fyller ut till 12 bokstäver
        while ( $whileBonusUnder12Int < 12) {
            $bonusGameLetters = $bonusGameLettersShuffledCut . chr(rand(97,122));
            $whileBonusUnder12Int ++;
        }
        // Slumpar runt bokstäverna
        $bonusGameLettersShuffled = str_shuffle($bonusGameLettersShuffledCut);
        // Gör alla bokstäver små
        $bonusGameLettersShuffledLower = strToLower($bonusGameLettersShuffled);
        // Skapar en lista av bokstäverna
        $bonusGameLettersArray = str_split($bonusGameLettersShuffledLower);
        // Skapar en lista av återstående bokstäver
        $bonusGameLettersShuffledRestArray = str_split($bonusGameLettersRemain);

        return view('bonus_screen', compact(["bonusGameLettersArray", "bonusGameLettersShuffledRestArray", "bonusGameLetters"]));
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
