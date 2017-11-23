<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\game;
use App\place;
use App\place_in_game;
use App\area;
use App\theme;
use App\question;
use App\question_in_game;
use App\Map;

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

        $numberOfStarslist = Place_in_game::where('gameId', $gameId)->pluck('numberOfStars')->toArray();

        $allAreas = Map::Find(1)->areas;

        $allPlaces = 0;
        foreach ($allAreas as $area) {
            $allPlaces += count($area->places);
        }

        $maxStars = $allPlaces * 3;

        $totalStars = 0;
        foreach ($numberOfStarslist as $numberOfStar) {
            $totalStars =+ $numberOfStar;
        }

        return view('home_screen', compact(['totalStars', 'maxStars', 'gameId']));
    }

    public function showArea(Request $request)
    {
        // Hämta PatientId från cookie
        $patientId = $request->cookie('patientId');

        // Hämta CurrentAreaId
        $patient = Patient::find($patientId);

        // Hämta GameId
        $gameId = $patient->game->id;

        $numberOfStarslist = Place_in_game::where('gameId', $gameId)->pluck('numberOfStars')->toArray();

        $allAreas = Map::Find(1)->areas;

        $allPlaces = 0;
        foreach ($allAreas as $area) {
            $allPlaces += count($area->places);
        }

        $maxStars = $allPlaces * 3;

        $totalStars = 0;
        foreach ($numberOfStarslist as $numberOfStar) {
            $totalStars =+ $numberOfStar;
        }

        try {

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
            'gameId' => $gameId
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
