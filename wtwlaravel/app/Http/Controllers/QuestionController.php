<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patients;
use App\game;
use App\places_in_games;
use App\areas;

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
        $patient = patients::find($patientId);

        $patient->Game()->areaId;
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
    public function show($id)
    {
        $Question = Question::with('id')->find($id);
        return view('question_screen', compact("Question"));
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

    public function stationId($id)
    {
        $stationId = $id;
        $patientId = $request->cookie('patientId');
        $patient = patients::find($patientId);
        return view('question_screen', compact(['patientId', 'stationId']));
    }
}
