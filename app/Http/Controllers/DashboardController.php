<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserTournament;
use Illuminate\Support\Facades\DB;

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
        $registrations = UserTournament::join('tournaments', 'user_tournaments.tournament_id', '=', 'tournaments.id')
            ->select(
                DB::raw('MONTH(user_tournaments.created_at) as month'),
                'tournaments.type',
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('user_tournaments.created_at', now()->year)
            ->groupBy(DB::raw('MONTH(user_tournaments.created_at)'), 'tournaments.type')
            ->orderBy(DB::raw('MONTH(user_tournaments.created_at)'))
            ->get();

        $labels = [
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $premiumRegistrations = [];
        $freeRegistrations = [];

        foreach ($registrations as $registration) {
            if ($registration->type === 'premium') {
                $premiumRegistrations[$registration->month] = $registration->count;
            } elseif ($registration->type === 'free') {
                $freeRegistrations[$registration->month] = $registration->count;
            }
        }

        // Fill any missing months with 0
        for ($month = 1; $month <= 12; $month++) {
            if (!isset($premiumRegistrations[$month])) {
                $premiumRegistrations[$month] = 0;
            }
            if (!isset($freeRegistrations[$month])) {
                $freeRegistrations[$month] = 0;
            }
        }
        $datasets = [
            'premium' => array_values($premiumRegistrations),
            'free' => array_values($freeRegistrations),
        ];
        $data = [
            'total_transaction' => UserTournament::where('status', 'active')->count(),
            'total_tournament' => Tournament::count(),
            'total_member' => User::count(),
            'total_revenue' => Order::where('status', 'PAYMENT_ACCEPTED')->sum('price'),
            'labels' => $labels,
            'datasets' => $datasets,
        ];
        return view('dashboard.index', $data);
    }
    public function registerTournament()
    {
        $data = UserTournament::get();
        return view('dashboard.registertournament.index', compact('data'));
    }
    public function detailRegisterTournament($code)
    {
        $data = UserTournament::whereCode($code)->firstOrFail();
        return view('dashboard.registertournament.show', compact('data'));
    }
}
