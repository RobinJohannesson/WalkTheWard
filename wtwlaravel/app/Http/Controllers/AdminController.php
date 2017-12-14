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
use App\Exercise;
use App\Statistics;
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
        // $patientId = $request->cookie('patientId');

        // Hämta Current Patient
        // $patient = Patient::find($patientId);


        $themes = Theme::all();

        return view('newQuestion', compact(["themes"]));
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

            // Kolla om filen finns och om den är giltig.
            if ($request->hasFile('fileToUpload')) {
                if ($request->file('fileToUpload')->isValid()) {

                    // Hämta filen från request.
                    $file = $request->file('fileToUpload');

                    // Hämta filnamnet. T.ex. my-photo.jpg
                    $fileName = time().'-'.mb_strtolower($file->getClientOriginalName(), 'UTF-8');

                    // Hämta filändelse. T.ex. jpg
                    $extesion = mb_strtolower($file->getClientOriginalExtension(), 'UTF-8');


                    $allowedImageTypes =  array('gif','png','jpg','jpeg');
                    $allowedVideoTypes =  array('mp4');

                    // Kontrollera om filen har en giltig bild filhändelse
                    if (in_array($extesion, $allowedImageTypes)) {

                        $destinationPath = public_path('\images\question_images');
                        $file->move($destinationPath, $fileName);
                        $Question->imageSource = $fileName;

                    }
                    // Kontrollera om filen har en giltig video filhändelse
                    elseif (in_array($extesion, $allowedVideoTypes)) {

                        $destinationPath = public_path('\videos\question_videos');
                        $file->move($destinationPath, $fileName);
                        $Question->videoSource = $fileName;

                    }
                    else {
                        // Om ingen giltig bild eller video laddades upp.
                    }
                }
            }

            $Question->themeId = $newThemeId;

            $Question->save();

            $statusMessage = "Frågan är nu skapad!";
            $statusCode = 1;

        } catch (Exception $e) {
            $statusMessage = "Frågan kunde INTE skapas! Pröva igen.";
            $statusCode = 0;
        }

        // $themes = Theme::all();
        // return view('newQuestion', compact(['statusMessage', 'statusCode', 'themes', 'Question']));
        // session(['statusMessage' => $statusMessage], ['statusCode' => $statusCode]);
        $request->session()->flash('statusMessage', $statusMessage);
        $request->session()->flash('statusCode', $statusCode);
        return redirect('admin');
    }

    public function theme(Request $request)
    {
        // Hämta PatientId från cookie
        // $patientId = $request->cookie('patientId');

        // Hämta CurrentAreaId
        // $patient = Patient::find($patientId);

        // Hämta GameId
        // $gameId = $patient->game->id;

        $theme = Theme::all();

        return view('adjustTheme', compact(["theme"]));
    }

    public function themeSave(Request $request)
    {
        // Skapar nytt tema om de valt det.
        if ($request->ifNewTheme == "yes") {
            $Theme = new Theme;
            $Theme->name = $request->newTheme;
            $Theme->isActive = $request->ifNewThemeActive;
            $Theme->save();
        }

        // Hämta en array med alla tema ids.
        $themeIds = Theme::where('id' ,'>' ,0)->pluck('id')->toArray();

        // Hämta totala antal teman.
        $themeIdsAmount = count($themeIds);

        $counter = 0;
        while ($counter < $themeIdsAmount) {
            $thisTurnId = array_values($themeIds)[$counter];

            // Hämta tema checkbox value. Value 1(true) eller null(false).
            // När man försöker hämta en unchecked checkbox får man tillbaka
            // null då den inte skickas inte med request.
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

    public function bonus(Request $request)
    {
        $bonus = Bonus_game::all();

        $bonusName = Bonus_game::pluck('lettersToDiscard')->toArray();

        $placeName = Place::pluck('name')->toArray();


        $placeWithoutBonus = array_diff($placeName, $bonusName);

        $placeWithoutBonusObj = "";
        $placeWithoutBonusObjList = array();
        foreach ($placeWithoutBonus as $pwb) {
            $placeWithoutBonusObj = Place::where("name", $pwb)->get();
            array_push($placeWithoutBonusObjList, $placeWithoutBonusObj);
        }

        return view('adjustBonus', compact(["bonus", "placeWithoutBonus", "placeWithoutBonusObjList"]));
    }

    public function bonusSave(Request $request)
    {
        // Skapar nytt tema om de valt det.
        if ($request->ifNewBonus == "yes") {
            $placeIdFromForm = $request->choosePlace;
            $place = Place::find($placeIdFromForm);
            $placeName = $place->name;
            $Bonus = new Bonus_game;
            $Bonus->lettersToDiscard = $placeName;
            $Bonus->imageSource = $request->fileToUpload;
            $Bonus->placeId = $request->choosePlace;
            $Bonus->save();
        }

        // Hämta en array med alla bonus ids.
        $bonusIds = Bonus_game::where('id' ,'>' ,0)->pluck('id')->toArray();

        // Hämta totala antal bonusfrågor.
        $bonusIdsAmount = count($bonusIds);

        $counter = 0;
        while ($counter < $bonusIdsAmount) {
            $thisTurnId = array_values($bonusIds)[$counter];

            // Hämta tema checkbox value. Value 1(true) eller null(false).
            // När man försöker hämta en unchecked checkbox får man tillbaka
            // null då den inte skickas inte med request.
            $checkboxIdUsageValue = $request->input($thisTurnId);
            if ($checkboxIdUsageValue == true) {
                // Theme::where(['id' => $thisTurnId])->update(['isActive' => 1]);
                $bonus_game_checked = Bonus_game::find($thisTurnId);
                $bonus_game_checked->delete();
            }
            $counter++;
        }

        return redirect('admin');
    }

    public function exercise(Request $request)
    {
        $exercise = Exercise::all();

        return view('adjustExercise', compact(["exercise"]));
    }

    public function exerciseSave(Request $request)
    {
        // Skapar nytt tema om de valt det.
        if ($request->ifNewExercise == "yes") {
            $Exercise = new Exercise;
            $Exercise->videoSource = $request->fileToUpload;
            $Exercise->isActive = $request->ifNewExerciseActive;
            $Exercise->save();
        }

        // Hämta en array med alla rörelse ids.
        $exerciseIds = Exercise::where('id' ,'>' ,0)->pluck('id')->toArray();

        // Hämta totala antal rörelse.
        $exerciseIdsAmount = count($exerciseIds);

        $counter = 0;
        while ($counter < $exerciseIdsAmount) {
            $thisTurnId = array_values($exerciseIds)[$counter];

            // Hämta tema checkbox value. Value 1(true) eller null(false).
            // När man försöker hämta en unchecked checkbox får man tillbaka
            // null då den inte skickas inte med request.
            $checkboxIdUsageValue = $request->input($thisTurnId);
            if ($checkboxIdUsageValue == true) {
                Exercise::where(['id' => $thisTurnId])->update(['isActive' => 1]);
            }
            if ($checkboxIdUsageValue == false) {
                Exercise::where(['id' => $thisTurnId])->update(['isActive' => 0]);
            }
            $counter++;
        }

        return redirect('admin');
    }

    public function showStatistics()
    {
        $statisticsList = Statistics::all();
        $patientList = Patient::all();
        return view('showStatistics', compact(["statisticsList", "patientList"]));
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
