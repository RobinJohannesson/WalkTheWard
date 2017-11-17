<?php

use App\Illuminate\Http\Request;
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

// Route::group([], function () {
// if (dd(Cookie::get('patientId') == null)
// if (true)
// {
//
//   return redirect()->route("registration");
//
// }
// vvv Add Routes Under This vvv
//Route::any('/{all}', function ($all) {
    //dd($all);
    //$allCont = $all . "Controller";
    //$allCont = ucfirst($allCont);
    // if (dd(Cookie::get('patientId')) != null) {
    //Route::GET($all, $allCont);
    //Route::GET('', 'WelcomeController');
        //$url = secure_url($all);
        //return redirect()->route($all);
    // }
//});
if($request->hasCookie('patientId')) {
    // do something
}

Route::resource('', "WelcomeController");

// Route::get('get-cookie', function() {
//   dd(Cookie::get('patientId')); // showing you different ways to set / get the cookie
// });

Route::GET('registration', ['as' => 'registration', 'uses' => "RegistrationController@index"]);

Route::POST('registration', "RegistrationController@store");

Route::resource('information', "InformationController");

Route::resource('instructions', "InstructionsController");

Route::resource('map', "MapController");

Route::resource('theme', "ThemeController");

Route::resource('scan', "ScanController");

Route::resource('question', "QuestionController");

Route::resource('question/{id}', 'QuestionController');

Route::resource('bonus', "BonusController");

Route::resource('home', "HomeController");

Route::resource('feedback', "FeedbackController");

Route::resource('statistics', "StatisticsController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





// });
