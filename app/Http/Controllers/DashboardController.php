<?php

namespace App\Http\Controllers;

use App\Models\UserTournament;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('member.index');
    }
    public function indexAdmin()
    {
        return view('dashboard.index');
    }
    public function registerTournament()
    {
        $data = UserTournament::get();
        return view('dashboard.registertournament.index', compact('data'));
    }
}
