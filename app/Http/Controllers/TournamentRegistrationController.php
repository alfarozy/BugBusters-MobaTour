<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\UserTournament;
use Illuminate\Http\Request;

class TournamentRegistrationController extends Controller
{
    public function index()
    {
        $data = UserTournament::where('user_id', auth()->id())->latest()->get();
        return view('member.tournament.index', compact('data'));
    }
}
