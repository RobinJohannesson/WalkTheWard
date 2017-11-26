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
        // Fyller på bokstäver om de är under 12
        while (strlen($bonusGameLetters) < 12) {
            $bonusGameLetters = $bonusGameLetters . chr(rand(97,122));
        }
        // Slumpar runt bokstäverna
        $bonusGameLettersShuffled = str_shuffle($bonusGameLetters);
        // Gör alla bokstäver små
        $bonusGameLettersShuffledLower = strToLower($bonusGameLettersShuffled);
        // Skapar en lista av bokstäverna
        $bonusGameLettersArray = str_split($bonusGameLettersShuffledLower);

        return view('bonus_screen', compact(["bonusGameLettersArray"]));
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
