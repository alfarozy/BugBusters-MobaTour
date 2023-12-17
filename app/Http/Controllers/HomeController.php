<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage.index');
    }

    public function tournamnet()
    {
        return view('homepage.index');
    }

    public function detailTournament()
    {
        return view('homepage.index');
    }
}
