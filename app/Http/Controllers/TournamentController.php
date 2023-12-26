<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $data = Tournament::latest()->get();
        return view("dashboard.tournament.index", compact('data'));
    }

    public function create()
    {
        return view("dashboard.tournament.create");
    }
}
