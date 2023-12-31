@extends('layouts.member')
@section('title', 'Detail registrasi turnamen')
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

                        <label for="user-name" class="block font-semibold mb-1">Kode pendaftaran</label>
                        <div id="user-name" class="text-grey-600">{{ $data->code }}</div>
                    </div>
                    <div>

                        <label for="user-name" class="block font-semibold mb-1">Nama tim</label>
                        <div id="user-name" class="text-grey-600">{{ $data->team_name }}</div>
                    </div>
                    <div>

                        <label for="user-name" class="block font-semibold mb-1">Whhatsapp</label>
                        <div id="user-name" class="text-grey-600">{{ $data->whatsapp }}</div>
                    </div>

                    <hr>
                    <h4 class="text-center">Informasi pemain</h4>
                    <hr>
                    <br>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                        <!-- Kapten (Player 1) -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <label for="player-captain" class="block font-semibold mb-2">Player 1 (Kapten)</label>
                            <div id="player-captain" class="text-gray-600">
                                {{ $data->player_captain_nickname }} ({{ $data->player_captain_id }})
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
                                    {{ $data->player_alternative_nickname }} ({{ $data->player_alternative_id }})
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

                <!-- User Email -->
                <div>
                    <div class="mb-5">
                        <img class="rounded shadow" src="{{ $data->tournament->getThumbnails() }}" alt=""
                            srcset="">
                    </div>
                    <div class="my-3">
                        <b style="display: block">{{ $data->tournament->title }}</b>
                    </div>
                    <hr>
                    <div class="mt-3">

                        <label for="user-name" class="block font-semibold mb-4">Status</label>
                        @if ($data->status == 'active')
                            <span class="w-100 bg-green-500 text-white px-4 py-3 text-xs rounded">BERHASIL</span>
                        @else
                            <span class="w-100 bg-yellow-500 text-white px-4 py-3 text-xs rounded">PENDING
                                <span class="text-grey-600">(Menunggu pembayaran)</span>
                            </span>
                            <br>
                        @endif
                    </div>
                    <br>
                    <br>
                    <hr>
                    <div class="mt-5">
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Bayar
                            Sekarang</button>

                    </div>
                </div>
            </div>


        </div>


    </main>

@endsection
