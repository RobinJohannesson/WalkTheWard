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


});



Route::GET('registration', "RegistrationController@index");

Route::POST('registration/store', "RegistrationController@store");



Route::middleware('auth')->group(function () {

    Route::GET('admin', "AdminController@index");

    Route::GET('admin/newQuestion', "AdminController@newQuestion");

    Route::POST('admin/newQuestion', "AdminController@newQuestionSave");

    Route::GET('admin/updateQuestion/{id}', "AdminController@updateQuestion");

    Route::POST('admin/updateQuestion/{id}', "AdminController@updateQuestionSave");

    Route::GET('admin/deleteQuestion', "AdminController@showDeleteQuestion");

    Route::POST('admin/deleteQuestion/getQuestions', "AdminController@getQuestions");

    Route::POST('admin/deleteQuestion/deleteQuestions', "AdminController@deleteQuestions");


    Route::GET('admin/adjustTheme', "AdminController@theme");

    Route::POST('admin/adjustTheme', "AdminController@themeSave");

    Route::GET('admin/adjustBonus', "AdminController@bonus");

    Route::POST('admin/adjustBonus', "AdminController@bonusSave");

    Route::GET('admin/adjustExercise', "AdminController@exercise");

    Route::POST('admin/adjustExercise', "AdminController@exerciseSave");

    Route::GET('admin/showStatistics', "AdminController@showStatistics");

    Route::POST('admin/showStatistics/download', "AdminController@downloadStatistics");

    Route::POST('admin/showStatistics/filter', "AdminController@filterStatistics");

    Route::GET('admin/showStatistics/filter', "AdminController@showStatistics");

    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('cache:clear');
        return redirect('/');
    });

});




Route::fallback(function(){
    return redirect('scan');
});




Route::get('/home', 'HomeController@index')->name('home');

// Samma routes som visas här nere.
// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');
