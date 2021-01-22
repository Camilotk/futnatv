<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $matches = Match::all();
        return view("home", compact('matches'));
    }
}
