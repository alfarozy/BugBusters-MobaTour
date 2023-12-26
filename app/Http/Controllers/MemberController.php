<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();

        return view('dashboard.member.index', compact('data'));
    }

    public function show($id)
    {
        $data = User::find($id);

        return view('dashboard.member.show', compact('data'));
    }
}


