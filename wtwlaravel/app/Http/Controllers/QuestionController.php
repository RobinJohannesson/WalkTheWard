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
        try {
            $gameId = $request->gameId;
            $questionId = $request->questionId;
            Question_in_game::where(['questionId' => $questionId, 'gameId' => $gameId])->update(['isAnswered' => 1]);

            $placeId = $request->placeId;

            $numberOfStars = $request->starsAmount;

            $placeInGame = Place_in_game::where('placeId', $placeId)->where('gameId', $gameId)->first();
            $oldStars = $placeInGame->numberOfStars;

            $question = Question::find($questionId);
            $correctAnswerId = $question->correctAnswer;

            $placeName = Place::find($placeId)->name;

            $isNewHighscore = false;
            if (intval($oldStars) < intval($numberOfStars)) {
                $isNewHighscore = true;
                // Uppdatera antal stjärnor om resutatet är bättre än föregående
                Place_in_game::where(['gameId' => $gameId, 'placeId' => $placeId])->update(['numberOfStars' => $numberOfStars]);
            }

            // Hämtar distance för användaren(cookien)
            $patientId = $request->cookie('patientId');
            $patient = Patient::find($patientId);
            $distanceAmount = $patient->distanceInMeter;

            $correctAnswer = "";
            if ($correctAnswerId == 1) {
                $correctAnswer = $question->answer1;
            }
            elseif ($correctAnswerId == 2) {
                $correctAnswer = $question->answer2;
            }
            elseif ($correctAnswerId == 3) {
                $correctAnswer = $question->answer3;
            }
            elseif ($correctAnswerId == 4) {
                $correctAnswer = $question->answer4;
            }
            else {
                $correctAnswer == null;
            }
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
            'numberOfStars' => $numberOfStars,
            'correctAnswer' => $correctAnswer,
            'placeName' => $placeName,
            'isNewHighscore' => $isNewHighscore,
            'distanceAmount' => $distanceAmount
        );

        return response()->json($response);
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

        // Skapa placeInGame om det inte redan finns
        if (Place_in_game::where('placeId', $placeId)->where('gameId', $gameId)->first() == null) {
            $newPlaceInGame = new place_in_game;
            $newPlaceInGame->gameId = $gameId;
            $newPlaceInGame->placeId = $placeId;
            $newPlaceInGame->numberOfStars = 0;
            $newPlaceInGame->save();
        }

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
        }
        $availableQuestion =  array_diff($themequestionIds, $qinGArray);

        if (count($availableQuestion) == 0) {
            foreach ($themeQuestions as $q) {
                Question_in_game::where(['questionId' => $q->id, 'gameId' => $gameId])->update(['isAnswered' => 0]);
            }
            $availableQuestion = $themequestionIds;
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

        return view('question_screen', compact(['currentTheme', 'question', 'gameId', 'placeId']));
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
