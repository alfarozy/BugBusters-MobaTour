<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\UserTournament;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_tournament' => UserTournament::where('status', 'active')->where('user_id', Auth()->id())->count(),
            'total_transaction' => Order::where('user_id', Auth()->id())->count()
        ];
        return view('member.index', $data);
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
