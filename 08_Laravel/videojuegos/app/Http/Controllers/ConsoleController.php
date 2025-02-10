<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    public function index(){
        
        $consolas = [
            "PS5",
            "PS4",
            "Nintendo Switch"
        ];

        return view("consolas");
    
    }
}
