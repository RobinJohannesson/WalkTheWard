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

        // Hämta Current Patient
        $patient = Patient::find($patientId);

        // Hämta GameId
        $gameId = $patient->game->id;

        $themes = Theme::all();

        return view('newQuestion', compact(["themes", "gameId"]));
    }

    public function newQuestionSave(Request $request)
    {
        $statusMessage = "";
        $statusCode = 0;
        $Question = null;
        try {
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
            $Question = new Question;

            $Question->question = $request->newQuestion;
            $Question->answer1 = $request->newQuestionFirstAlternative;
            $Question->answer2 = $request->newQuestionSecondAlternative;
            $Question->answer3 = $request->newQuestionThirdAlternative;
            $Question->answer4 = $request->newQuestionForthAlternative;
            $Question->correctAnswer = $request->newQuestionRightAlternative;

            if ($request->hasFile('fileToUpload')) {
                if ($request->file('fileToUpload')->isValid()) {

                    $file = $request->file('fileToUpload');

                    $fileName = time().'-'.mb_strtolower($file->getClientOriginalName(), 'UTF-8');

                    $extesion = mb_strtolower($file->getClientOriginalExtension(), 'UTF-8');


                    $allowedImageTypes =  array('gif','png','jpg','jpeg');
                    $allowedVideoTypes =  array('mp4');
                    if (in_array($extesion, $allowedImageTypes)) {

                        $destinationPath = public_path('\images\question_images');
                        $file->move($destinationPath, $fileName);
                        $Question->imageSource = $fileName;

                    }
                    elseif (in_array($extesion, $allowedVideoTypes)) {

                        $destinationPath = public_path('\videos\question_videos');
                        $file->move($destinationPath, $fileName);
                        $Question->videoSource = $fileName;

                    }
                    else {
                        // If no video or image was set.
                    }
                }
            }

            $Question->themeId = $newThemeId;

            $Question->save();
            $statusMessage = "Frågan är nu skapad!";
            $statusCode = "1";

        } catch (Exception $e) {
            $statusMessage = "Frågan kunde INTE skapas! Pröva igen.";
        }

        $themes = Theme::all();

        return view('newQuestion', compact(['statusMessage', 'statusCode', 'themes', 'Question']));
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
