<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$videojuegos = [
            ["Hollow Knight", "PEGI 18", "Aventuras"],
            ["Elden Ring", "PEGI 18", "Souls"],
            ["The Legend of Zelda", "PEGI 7", "Aventuras"]
        ];*/
        $videojuegos = Videojuego::all();
        return view('videojuegos/index',  ["videojuegos" => $videojuegos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
