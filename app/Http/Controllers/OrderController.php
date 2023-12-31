<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
}
