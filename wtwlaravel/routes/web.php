<?php

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

Route::resource('', "WelcomeController");

Route::get('get-cookie', function() {
   dd(Cookie::get('patientId')); // showing you different ways to set / get the cookie
});

Route::GET('registration', "RegistrationController@index");

Route::POST('registration', "RegistrationController@store");

Route::resource('information', "InformationController");

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
