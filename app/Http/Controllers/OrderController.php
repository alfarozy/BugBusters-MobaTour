<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::where('user_id', auth()->id())->latest()->get();
        return view('member.order.index', compact('data'));
    }
    public function show($invoice)
    {
        $data = Order::where('user_id', auth()->id())->whereInvoice($invoice)->firstOrFail();
        return view('member.order.show', compact('data'));
    }
    public function downloadInvoice($invoice)
    {
        $data = Order::where('user_id', auth()->id())->whereInvoice($invoice)->firstOrFail();

        $dataInvoice  = [
            'invoice' => $data->invoice,
            'memberName' => $data->user->name,
            'email' => $data->user->email,
            'date' => $data->created_at->translatedFormat('d F Y'),
            'total_price' => $data->price,
            'tournament' => $data->tournament->title,
            'code' => $data->userTournament->code,
            'teamName' => $data->userTournament->team_name,
        ];


        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('pdf.invoice', $dataInvoice)
            ->setPaper('a4', 'landscape');

        // Download PDF dengan nama file tertentu
        return $pdf->download('invoice_' . $data->invoice . '.pdf');
    }
}
