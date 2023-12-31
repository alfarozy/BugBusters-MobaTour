<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tournament;
use App\Models\UserTournament;
use Illuminate\Http\Request;
use Xendit\Xendit;


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
        if (isExpired($data->end_register_date)) {
            return abort(404);
        }
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
            'player_alternative_nickname' => 'sometimes|nullable|string|max:255',
            'player_alternative_id' => 'sometimes|nullable|string|max:255',
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
            $price = 0;
            $statusOrder = 'PAYMENT_ACCEPTED';
        } else {
            $attr['status'] = 'pending';
            $price = $data->price;
            $statusOrder = 'UNPAID';
        }

        $userTournament = UserTournament::create($attr);

        $order = Order::create([
            'user_id' => auth()->id(),
            'tournament_id' => $data->id,
            'user_tournament_id' => $userTournament->id,
            'invoice' => randomIdTransaction(),
            'price' => $price,
            'order_date' => now(),
            'payment_date' => now(),
            'expired_date' => now(),
            'invoice_url' => null,
            'status' => $statusOrder
        ]);
        if ($data->type == Tournament::TYPE_FREE) {
            return redirect()->route('orders.show', $order->invoice)->with('success', 'Registrasi berhasil, silahkan tunggu info selanjutnya kami akan mengabari anda melalui whatsapp.');
        } else {
            Xendit::setApiKey(env('XENDIT_API_KEY'));
            $create_invoice_request = [
                'external_id' => $order->invoice,
                'description' => "Biaya registrasi turnamen " . $data->title,
                'payer_email' => auth()->user()->email,
                'amount' => $price,
                'invoice_duration' => 86400,
                'should_send_email' => false,
                'currency' => 'IDR',
                'success_redirect_url' => env('APP_URL') . '/dashboard/orders/' . $order->invoice,
                'reminder_time' => 1,
                'metadata' => [
                    'branch_code' => 'mobatourney'
                ]
            ];
            $result = \Xendit\Invoice::create($create_invoice_request);
            $order->update(['invoice_url' => $result['invoice_url']]);
            $redirectTo = $result['invoice_url'];
            return redirect()->to($redirectTo);
        }
    }
}
