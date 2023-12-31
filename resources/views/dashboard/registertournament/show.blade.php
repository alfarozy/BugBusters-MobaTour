@extends('layouts.dashboard')
@section('title', 'Detail registrasi tournamen')
@section('content')
    <main class="w-full flex-grow p-6">
        <div class="flex items-center justify-between mb-6">
            <!-- Left side - Title -->
            <h1 class="text-3xl text-black">@yield('title')</h1>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div>
                        <label for="invoice" class="block font-semibold mb-1">Invoice</label>
                        <div id="invoice" class="text-grey-600">{{ $data->order->invoice }}</div>
                    </div>
                    <div>
                        <label for="order-date" class="block font-semibold mb-1">Tanggal Pesanan</label>
                        <div id="order-date" class="text-grey-600">{{ $data->order->order_date }}</div>
                    </div>
                    <div>
                        <label for="payment-date" class="block font-semibold mb-1">Tanggal Pembayaran</label>
                        <div id="payment-date" class="text-grey-600">{{ $data->order->payment_date }}</div>
                    </div>
                    <div>

                        <label for="user-name" class="block font-semibold mb-1">Kode pendaftaran</label>
                        <div id="user-name" class="text-grey-600">{{ $data->code }}</div>
                    </div>
                    <div>

                        <label for="user-name" class="block font-semibold mb-1">Whatsapp</label>
                        <div id="user-name" class="text-grey-600">{{ $data->whatsapp }}</div>
                    </div>
                </div>

                <div>

                    <div>
                        <label for="price" class="block font-semibold mb-1">Turnamen</label>
                        <div id="price" class="text-grey-600">{{ $data->tournament->title }}</div>
                    </div>
                    <div>
                        <label for="user-name" class="block font-semibold mb-1">Nama tim</label>
                        <div id="user-name" class="text-grey-600">{{ $data->team_name }}</div>
                    </div>

                    <div>
                        <label for="price" class="block font-semibold mb-1">Harga</label>
                        <div id="price" class="text-grey-600">{{ currencyIDR($data->order->price) }}</div>
                    </div>
                    @php
                        $status = $data->order->status;
                    @endphp

                    @if ($status === 'UNPAID')
                        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Status:</p>
                            <p>Belum Dibayar</p>
                        </div>
                    @elseif($status === 'PAYMENT_ACCEPTED')
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Status:</p>
                            <p>Pembayaran Diterima</p>
                        </div>
                    @elseif($status === 'EXPIRED')
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Status:</p>
                            <p>Kadaluarsa</p>
                        </div>
                    @elseif($status === 'CANCELLED')
                        <div class="bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Status:</p>
                            <p>Dibatalkan</p>
                        </div>
                    @else
                        <!-- Menampilkan pesan default jika status tidak cocok dengan kondisi di atas -->
                        <div class="bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Status:</p>
                            <p>Belum diketahui</p>
                        </div>
                    @endif
                </div>
            </div>

            <hr>

            <h4 class="text-center">Informasi Pendaftaran</h4>

            <hr>

            <br>

            <!-- Informasi Pemain (gunakan informasi dari $data) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                <!-- Kapten (Player 1) -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <label for="player-captain" class="block font-semibold mb-2">Player 1 (Kapten)</label>
                    <div id="player-captain" class="text-gray-600">
                        {{ $data->player_captain_nickname }}
                        ({{ $data->player_captain_id }})
                    </div>
                </div>

                <!-- Anggota (Player 2) -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <label for="player-2" class="block font-semibold mb-2">Player 2</label>
                    <div id="player-2" class="text-gray-600">
                        {{ $data->player_2_nickname }} ({{ $data->player_2_id }})
                    </div>
                </div>

                <!-- Anggota (Player 3) -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <label for="player-3" class="block font-semibold mb-2">Player 3</label>
                    <div id="player-3" class="text-gray-600">
                        {{ $data->player_3_nickname }} ({{ $data->player_3_id }})
                    </div>
                </div>

                <!-- Anggota (Player 4) -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <label for="player-4" class="block font-semibold mb-2">Player 4</label>
                    <div id="player-4" class="text-gray-600">
                        {{ $data->player_4_nickname }} ({{ $data->player_4_id }})
                    </div>
                </div>

                <!-- Anggota (Player 5) -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <label for="player-5" class="block font-semibold mb-2">Player 5</label>
                    <div id="player-5" class="text-gray-600">
                        {{ $data->player_5_nickname }} ({{ $data->player_5_id }})
                    </div>
                </div>

                <!-- Pemain Cadangan -->
                @if ($data->player_alternative_nickname)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <label for="player-alternative" class="block font-semibold mb-2">Pemain Cadangan</label>
                        <div id="player-alternative" class="text-gray-600">
                            {{ $data->player_alternative_nickname }}
                            ({{ $data->player_alternative_id }})
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </main>


@endsection
