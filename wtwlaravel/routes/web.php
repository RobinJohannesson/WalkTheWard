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

Route::resource('/welcome', "WelcomeController");

Route::resource('', "WelcomeController");

Route::middleware('checkCookie')->group(function () {

    Route::resource('start', "StartController");

    Route::resource('information', "InformationController");

    Route::resource('instructions', "InstructionsController");

    Route::resource('map', "MapController");

    Route::resource('theme', "ThemeController");

    Route::resource('scan', "ScanController");

    Route::resource('question', "QuestionController");

    Route::get('question/{id}', 'QuestionController@show');

    Route::resource('bonus', "BonusController");

    Route::resource('home', "HomeController");

    Route::resource('feedback', "FeedbackController");

    Route::resource('statistics', "StatisticsController");

    Route::get('/home', 'HomeController@index')->name('home');

    Auth::routes();
});

Route::GET('registration', "RegistrationController@index"]);

Route::POST('registration', "RegistrationController@store");

Route::fallback(function(){
    return 'sorry';
});





// });
