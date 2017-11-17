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

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stationId = "2";
        $patientId = $request->cookie('patientId');
        $patient = patient::find($patientId);

        //$patient->Game()->areaId;
        return view('question_screen', compact(['patient', 'stationId']));
        // return view('question_screen');
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
        //$QuestionsInGame = QuestionsInGame::where("gameId", "=", $request->gameId)->first();
        //$QuestionsInGame->isAnswered = $request->questionid;
        //$QuestionsInGame->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $testing = "testing";

        $stationId = $id;
        $patientId = $request->cookie('patientId');
        $patient = patient::find($patientId);
        $gameId = Patient::find($patientId)->game->id;
        $area = Patient::find($patientId)->game->area->id;
        $place = Place::where('stationId', $stationId)->where('areaId', $area)->first();
        $placeId = $place->id;
        $place_in_game = Place_in_game::where('placeId', $placeId)->where('gameId', $gameId)->first();
        if ($place_in_game->numberOfStars != null) {
            $testing = "not null";
        }
        $currentThemeId = Patient::find($patientId)->game->themeId;
        $question_in_game = Question_in_game::where('gameId', $gameId)->first();
        $question = $question_in_game->question;
        $theme = $question->theme;
        $themeId = $question->theme->id;
        $themequestion = $theme->questions;
        $themequestionIds = Question::where('themeId', $themeId)->pluck('id')->toArray();
        $qinGArray = array();
        foreach ($themequestion as $q) {
            if (Question_in_game::where('gameId', $gameId)->where('questionId', $q->id)->where('isAnswered', 1)->first()) {
                array_push($qinGArray, $q->id);
            }
            $availableQuestion =  array_diff($themequestionIds, $qinGArray);
        }
        // TEST
        $randomQuestionId = array_random($availableQuestion);
        $showQuestion = Question::find($randomQuestionId);
        return view('backend_screen', compact(['testing', 'showQuestion']));
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
