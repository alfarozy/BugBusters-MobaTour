<?php

namespace App\Http\Controllers;

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
}
