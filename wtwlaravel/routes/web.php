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

Route::get('/', function () {
    return view('welcome_screen');
});

Route::get('/registration', function () {
    return view('registration_screen');
});

Route::get('/information', function () {
    return view('information_screen');
});

Route::get('/map', function () {
    return view('map_screen');
});

Route::get('/theme', function () {
    return view('theme_screen');
});

Route::get('/scan', function () {
    return view('scan_screen');
});

Route::get('/question', function () {
    return view('question_screen');
});

Route::get('/bonus', function () {
    return view('bonus_screen');
});

Route::get('/home', function () {
    return view('home_screen');
});

Route::get('/feedback', function () {
    return view('feedback_screen');
});
