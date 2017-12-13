<?php

use App\Http\Middleware\CheckCookie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::GET('', "WelcomeController@index");

Route::middleware('checkCookie')->group(function () {

    // Route::resource('start', "StartController");

    Route::resource('information', "InformationController");

    // Route::resource('instructions', "InstructionsController");

    // Route::GET('instructions-2', function() { return view("instructions_screen2"); });

    Route::GET('map', "MapController@show");

    Route::POST('map/store', "MapController@store");

    Route::GET('theme', "ThemeController@show");

    Route::POST('theme/store', "ThemeController@store");

    Route::resource('scan', "ScanController");

    // Route::resource('question', "QuestionController");

    Route::GET('question/station/{id}', 'QuestionController@show');

    Route::POST('question/store', 'QuestionController@store');

    Route::GET('bonus/{id}', "BonusController@index");

    // Route::POST('bonus/store', "BonusController@store");

    Route::GET('gameHome', "GameHomeController@showAll");

    Route::POST('gameHome', "GameHomeController@showArea");

    Route::resource('feedback', "FeedbackController");

    Route::GET('statistics', "StatisticsController@show");

    Route::POST('statistics/store', "StatisticsController@store");

    Route::GET('admin', "AdminController@index");

    Route::GET('admin/newQuestion', "AdminController@newQuestion");

    Route::POST('admin/newQuestion', "AdminController@newQuestionSave");

    Route::GET('admin/adjustTheme', "AdminController@theme");

    Route::POST('admin/adjustTheme', "AdminController@themeSave");

    Route::GET('admin/adjustBonus', "AdminController@bonus");

    Route::POST('admin/adjustBonus', "AdminController@bonusSave");

    Route::GET('admin/adjustExercise', "AdminController@exercise");

    Route::POST('admin/adjustExercise', "AdminController@exerciseSave");

    Auth::routes();
});

Route::GET('registration', "RegistrationController@index");

Route::POST('registration/store', "RegistrationController@store");

Route::fallback(function(){
    return redirect('scan');
});





// });
