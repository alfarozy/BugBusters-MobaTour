@extends('layouts.member')
@section('title', 'Moba tourney')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-bold mb-2">Turnamen diikuti</h2>
                <p class="text-gray-700">{{ $total_tournament }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-bold mb-2">Total transaksi</h2>
                <p class="text-gray-700">{{ $total_transaction }}</p>
            </div>

        </div>

    </div>
@endsection

