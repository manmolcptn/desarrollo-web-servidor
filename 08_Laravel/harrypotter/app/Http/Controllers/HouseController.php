<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index(){
        
        $houses = [
            "Griffindor", 
            "Ravenclaw",
            "Hufflepuff",
            "Slytherin"
        ];

        return view("houses");
    }
}
