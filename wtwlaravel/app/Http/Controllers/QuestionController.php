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
        $QuestionsInGame = QuestionsInGame::where("gameId", "=", $request->gameId)->first();
        $QuestionsInGame->isAnswered = $request->questionid;
        $QuestionsInGame->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $message = "";

        // StationId från URL question/{stationId}
        $stationId = $id;

        // Hämta PatientId från cookie
        $patientId = $request->cookie('patientId');

        // Hämta CurrentAreaId
        $patient = Patient::find($patientId);
        $areaId = $patient->game->area->id;

        // Hämta PlaceId
        $place = Place::where('stationId', $stationId)->where('areaId', $areaId)->first();
        $placeId = $place->id;

        // Hämta GameId
        $gameId = $patient->game->id;

        // Hämta Place_in_Game (antal stjärnor)
        $place_in_game = Place_in_game::where('placeId', $placeId)->where('gameId', $gameId)->first();

        if ($place_in_game->numberOfStars != null) {
            $message = "Number of stars is not null";
        }

        // Hämta currentThemeId
        $currentThemeId = $patient->game->themeId;

        // Hämta currentTheme
        $currentTheme = Theme::Find($currentThemeId);

        // $question_in_game = Question_in_game::where('gameId', $gameId)->first();
        // $question = $question_in_game->question;
        // $theme = $question->theme;
        // $themeId = $question->theme->id;



        $themeQuestions = $currentTheme->questions;
        $themequestionIds = Question::where('themeId', $currentThemeId)->pluck('id')->toArray();
        $qinGArray = array();
        foreach ($themeQuestions as $q) {
            if (Question_in_game::where('gameId', $gameId)->where('questionId', $q->id)->where('isAnswered', 1)->first()) {
                array_push($qinGArray, $q->id);
            }
            $availableQuestion =  array_diff($themequestionIds, $qinGArray);
        }

        $randomQuestionId = array_random($availableQuestion);

        $question = Question::find($randomQuestionId);

        if (Question_in_game::where('gameId', $gameId)->where('questionId', $randomQuestionId)->first() == null) {
            $newQuestionInGame = new question_in_game;
            $newQuestionInGame->gameId = $gameId;
            $newQuestionInGame->questionId = $randomQuestionId;
            $newQuestionInGame->isAnswered = 0;
            $newQuestionInGame->save();
        }

        return view('question_screen', compact(['currentTheme', 'question']));
        // return view('backend_screen', compact(['testing', 'showQuestion']));
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
