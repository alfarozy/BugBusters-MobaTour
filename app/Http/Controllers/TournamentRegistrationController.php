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
    public function show($code)
    {
        $data = UserTournament::where('user_id', auth()->id())->whereCode($code)->firstOrFail();
        return view('member.tournament.show', compact('data'));
    }
    public function registration($slug)
    {

        $data = Tournament::whereSlug($slug)->firstOrFail();
        return view('member.tournament.registration', compact('data'));
    }

    public function registrationAct(Request $request, $slug)
    {
        $data = Tournament::whereSlug($slug)->firstOrFail();
        $attr = $request->validate([
            'team_name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20', // Sesuaikan panjang maksimal sesuai kebutuhan
            'player_captain_nickname' => 'required|string|max:255',
            'player_captain_id' => 'required|string|max:255',
            'player_2_nickname' => 'required|string|max:255',
            'player_2_id' => 'required|string|max:255',
            'player_3_nickname' => 'required|string|max:255',
            'player_3_id' => 'required|string|max:255',
            'player_4_nickname' => 'required|string|max:255',
            'player_4_id' => 'required|string|max:255',
            'player_5_nickname' => 'required|string|max:255',
            'player_5_id' => 'required|string|max:255',
            'player_alternative_nickname' => 'required|string|max:255',
            'player_alternative_id' => 'required|string|max:255',
        ], [
            'required' => ':attribute wajib diisi.',
            'exists' => ':attribute yang dipilih tidak valid.',
            'string' => ':attribute harus berupa teks.',
            'max' => ':attribute tidak boleh melebihi :max karakter.',
            'numeric' => ':attribute harus berupa angka.',
            'in' => ':attribute harus salah satu dari: :values.',
        ], [
            'team_name' => 'Nama Tim',
            'whatsapp' => 'Nomor WhatsApp',
            'player_captain_nickname' => 'Nickname Kapten',
            'player_captain_id' => 'ID Kapten',
            'player_2_nickname' => 'Nickname Pemain 2',
            'player_2_id' => 'ID Pemain 2',
            'player_3_nickname' => 'Nickname Pemain 3',
            'player_3_id' => 'ID Pemain 3',
            'player_4_nickname' => 'Nickname Pemain 4',
            'player_4_id' => 'ID Pemain 4',
            'player_5_nickname' => 'Nickname Pemain 5',
            'player_5_id' => 'ID Pemain 5',
            'player_alternative_nickname' => 'Nickname Pemain Cadangan',
            'player_alternative_id' => 'ID Pemain Cadangan',
        ]);
        $attr['user_id'] = Auth()->id();
        $attr['tournament_id'] = $data->id;
        $attr['code'] = generateRregistrationCode();

        if ($data->type == Tournament::TYPE_FREE) {
            $attr['status'] = 'active';
        } else {
            $attr['status'] = 'pending';
            //> create order
        }

        $userTournament = UserTournament::create($attr);

        if ($data->type == Tournament::TYPE_FREE) {
            return redirect()->route('member-tournaments.index')->with('success', 'Berhaasil mendaftar.');
        } else {
            return redirect()->route('member-tournaments.show', $userTournament->code)->with('success', 'Mohon selesaikan pembayaran untuk melanjutkan');
        }
    }
}
