<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;

class HomeController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::where('is_active', 1)->latest()->limit(3)->get();
        return view('homepage.index', compact('tournaments'));
    }

    public function tournament()
    {
        $tournaments = Tournament::where('is_active', 1)->latest()->paginate(9);
        return view('homepage.tournament.index', compact('tournaments'));
    }

    public function detailTournament($slug)
    {
        $data = Tournament::whereSlug($slug)->firstOrFail();
        return view('homepage.tournament.show', compact('data'));
    }
}
