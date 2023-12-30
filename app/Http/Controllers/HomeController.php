<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage.index');
    }

    public function tournament()
    {
        return view('homepage.tournament.index');
    }

    public function detailTournament()
    {
        return view('homepage.tournament.show');
    }
}
