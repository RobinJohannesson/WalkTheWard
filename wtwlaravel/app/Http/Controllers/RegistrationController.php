<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\patient;
use App\game;
use App\character;
use App\Http\Controllers\Cookie;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::All();
        return view("registration_screen", compact(['characters']));
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

        $Game = new Game;

        $Game->save();
        $gameId = $Game->id;

        $Patient = new Patient;

        $Patient->age = $request->age;
        $Patient->gender = $request->gender;
        $Patient->roomType = $request->roomType;
        $Patient->gameId = $gameId;
        $Patient->characterId = $request->characterId;
        $Patient->wardId = 1;
        $Patient->save();

        $cookie = cookie('patientId', $Patient->id, 2628000);


        return redirect('information')->withCookie($cookie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
