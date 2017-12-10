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

class AdminController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        return view('admin');
    }

    public function newQuestion(Request $request)
    {
        // Hämta PatientId från cookie
        $patientId = $request->cookie('patientId');

        // Hämta CurrentAreaId
        $patient = Patient::find($patientId);

        // Hämta GameId
        $gameId = $patient->game->id;

        $theme = Theme::all();

        return view('newQuestion', compact(["theme", "gameId"]));
    }

    public function newQuestionSave(Request $request)
    {
        // Skapar nytt tema om de valt det
        if ($request->newQuestionTheme == "0") {
            $Theme = new Theme;
            $Theme->name = $request->newQuestionNewTheme;
            $Theme->isActive = 1;
            $Theme->save();
            $newThemeId = $Theme->id;
        }
        else {
            $newThemeId = $request->newQuestionTheme;
        }
        // Skapar ny fråga utifrån användarens val
        $Questions = new Question;

        $Questions->question = $request->newQuestion;
        $Questions->answer1 = $request->newQuestionFirstAlternative;
        $Questions->answer2 = $request->newQuestionSecondAlternative;
        $Questions->answer3 = $request->newQuestionThirdAlternative;
        $Questions->answer4 = $request->newQuestionForthAlternative;
        $Questions->correctAnswer = $request->newQuestionRightAlternative;
        // $Questions->$fileType = $request->fileToUpload;
        $Questions->themeId = $newThemeId;
        $Questions->save();

        return redirect('admin');
    }

    public function theme(Request $request)
    {
        // Hämta PatientId från cookie
        $patientId = $request->cookie('patientId');

        // Hämta CurrentAreaId
        $patient = Patient::find($patientId);

        // Hämta GameId
        $gameId = $patient->game->id;

        $theme = Theme::all();

        return view('adjustTheme', compact(["theme", "gameId"]));
    }

    public function themeSave(Request $request)
    {
        // Skapar nytt tema om de valt det
        if ($request->ifNewTheme == "yes") {
            $Theme = new Theme;
            $Theme->name = $request->newTheme;
            $Theme->isActive = $request->ifNewThemeActive;
            $Theme->save();
        }

        $themeIds = Theme::where('id' ,'>' ,0)->pluck('id')->toArray();
        $themeIdsAmount = count($themeIds);
        $counter = 0;
        while ($counter < $themeIdsAmount) {
            $thisTurnId = array_values($themeIds)[$counter];
            $checkboxIdUsageValue = $request->input($thisTurnId);
            if ($checkboxIdUsageValue == true) {
                Theme::where(['id' => $thisTurnId])->update(['isActive' => 1]);
            }
            if ($checkboxIdUsageValue == false) {
                Theme::where(['id' => $thisTurnId])->update(['isActive' => 0]);
            }
            $counter++;
        }

        return redirect('admin');
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

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(Request $request, $id)
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
