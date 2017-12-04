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

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }


    public function showAll(Request $request)
    {
        // Hämta PatientId från cookie
        $patientId = $request->cookie('patientId');

        // Hämta CurrentAreaId
        $patient = Patient::find($patientId);

        // Hämta GameId
        $gameId = $patient->game->id;

        // Hämtar distanceInMeter
        $distanceAmount = $patient->distanceInMeter;

        $numberOfStarslist = Place_in_game::where('gameId', $gameId)->pluck('numberOfStars')->toArray();

        // Hämta alla stationer där användaren varit
        $placeIdlist = Place_in_game::where('gameId', $gameId)->pluck('placeId')->toArray();

        $allAreas = Map::find(1)->areas;

        $mapAreaObj = Map::find(1);

        $mapArea = $mapAreaObj->name;

        $allPlaces = 0;
        foreach ($allAreas as $area) {
            $allPlaces += count($area->places);
        }

        $maxStars = $allPlaces * 3;

        $totalStars = 0;
        foreach ($numberOfStarslist as $numberOfStar) {
            $totalStars += $numberOfStar;
        }

        return view('home_screen', compact(['totalStars', 'maxStars', 'gameId', 'distanceAmount', 'mapArea', 'placeIdlist']));
    }

    public function showArea(Request $request)
    {
        try {
        // Hämta PatientId från cookie
        $patientId = $request->cookie('patientId');

        // Hämta CurrentAreaId
        $patient = Patient::find($patientId);

        // Hämta GameId
        $gameId = $patient->game->id;

        $areaId = $request->areaId;

        $places = Area::find($areaId)->places;

        $mapNameObj = Map::find(1);

        $mapName = $mapNameObj->name;

        $areaNameObj = Area::find($areaId);

        $areaName = $areaNameObj->name;

        $mapArea = $areaName . " " . $mapName;

        $totalStars = 0;
        foreach ($places as $place) {
            $pIG = Place_in_game::where('gameId', $gameId)->where('placeId', $place->id)->first();
            if ($pIG) {
                $totalStars += $pIG->numberOfStars;
            }
        }

        $allPlaces = 0;
        $allPlaces = count(Area::find($areaId)->places);

        $maxStars = $allPlaces * 3;

        $numberCity = $areaId . "City";

        // Hämta alla stationer där användaren varit
        // $placeIdlist = Place_in_game::where('gameId', $gameId)->pluck('placeId')->toArray();
        //
        // $placeIdlistcompare = array.diff();

        }
        catch (\Exception $e) {
            $error = $e->getMessage();
            $response = array(
                'status' => 'error',
                'msg' => $error
            );
            return response()->json($response);
        }

        $response = array(
            'status' => 'success',
            'totalStars' => $totalStars,
            'maxStars' => $maxStars,
            'gameId' => $gameId,
            'numberCity' => $numberCity,
            'mapArea' => $mapArea
        );
        // return view('home_screen', compact(['totalStars', 'maxStars', 'gameId']));
        return response()->json($response);
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
