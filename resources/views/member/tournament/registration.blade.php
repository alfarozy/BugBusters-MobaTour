@extends('layouts.member')
@section('title', 'Registrasi tournamen ' . $data->title)
@section('content')
    <main class="w-full flex-grow p-6">
        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
                <form class="p-10 bg-white rounded shadow-xl" method="POST"
                    action="{{ route('tournament.registration', $data->slug) }}">
                    @csrf
                    <div class="flex justify-center">

                        <div class="lg:w-1/3 pr-4">

                            <div class="mb-5">
                                <img class="rounded shadow" src="{{ $data->getThumbnails() }}" alt="" srcset="">
                            </div>
                            <div class="mt-3">
                                <b style="display: block">{{ $data->title }}</b>
                            </div>
                            <br>
                            <hr>
                            <div class="mt-3">
                                <b style="display: block">Tim yang terdaftar</b>
                                <p class="text-grey-500 mb-3">
                                    {{ $data?->userTournaments?->count() ?? 0 }}/{{ $data->slot }} </p>
                            </div>
                            <div class="mt-3">
                                <b style="display: block">Tipe turnamen</b>
                                <p class="text-grey-500 mb-3">
                                    @if ($data->type == 'free')
                                        <span
                                            class="mb-6 inline-block rounded border text-green-600 px-4 py-0.5 text-center text-xs font-medium leading-loose text-white">
                                            Pendaftaran gratis
                                        </span>
                                    @else
                                        <span
                                            class="mb-6 inline-block rounded border text-blue-600 px-4 py-0.5 text-center text-xs font-medium leading-loose text-white">
                                            Berbayar {{ currencyIDR($data->price) }} / Team
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="lg:w-2/3 pl-4">
                            <div class="mt-2 flex">
                                <!-- Player Captain -->
                                <div class="w-1/2 pr-2">
                                    <label for="team_name" class="block text-sm text-gray-600">Nama Tim</label>
                                    <input type="text" id="team_name" name="team_name"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('team_name') border border-red-500 @enderror"
                                        value="{{ old('team_name') }}" placeholder="Nama tim">
                                    @error('team_name')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Player Captain ID -->
                                <div class="w-1/2 pl-2">
                                    <label for="whatsapp" class="block text-sm text-gray-600">Nomor Whatsapp</label>
                                    <input type="text" id="whatsapp" name="whatsapp"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('whatsapp') border border-red-500 @enderror"
                                        value="{{ old('whatsapp') }}" placeholder="Whatsapp" aria-label="Whatsapp">
                                    @error('whatsapp')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2 flex">
                                <!-- Player Captain -->
                                <div class="w-1/2 pr-2">
                                    <label for="player_captain_nickname" class="block text-sm text-gray-600">Nickname
                                        Kapten (Player 1)</label>
                                    <input type="text" id="player_captain_nickname" name="player_captain_nickname"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_captain_nickname') border border-red-500 @enderror"
                                        value="{{ old('player_captain_nickname') }}" placeholder="Nickname Kapten"
                                        aria-label="Nickname Kapten">
                                    @error('player_captain_nickname')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Player Captain ID -->
                                <div class="w-1/2 pl-2">
                                    <label for="player_captain_id" class="block text-sm text-gray-600">ID Kapten</label>
                                    <input type="text" id="player_captain_id" name="player_captain_id"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_captain_id') border border-red-500 @enderror"
                                        value="{{ old('player_captain_id') }}" placeholder="ID Kapten"
                                        aria-label="ID Kapten">
                                    @error('player_captain_id')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2 flex">
                                <div class="w-1/2 pr-2">
                                    <label for="player_2_nickname" class="block text-sm text-gray-600">Nickname
                                        Pemain (Player 2)</label>
                                    <input type="text" id="player_2_nickname" name="player_2_nickname"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_2_nickname') border border-red-500 @enderror"
                                        value="{{ old('player_2_nickname') }}" placeholder="Nickname pemain"
                                        aria-label="Nickname pemain">
                                    @error('player_2_nickname')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="w-1/2 pl-2">
                                    <label for="player_2_id" class="block text-sm text-gray-600">ID Pemain</label>
                                    <input type="text" id="player_2_id" name="player_2_id"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_2_id') border border-red-500 @enderror"
                                        value="{{ old('player_2_id') }}" placeholder="ID Pemain" aria-label="ID Kapten">
                                    @error('player_2_id')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2 flex">
                                <div class="w-1/2 pr-2">
                                    <label for="player_3_nickname" class="block text-sm text-gray-600">Nickname
                                        Pemain (Player 3)</label>
                                    <input type="text" id="player_3_nickname" name="player_3_nickname"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_3_nickname') border border-red-500 @enderror"
                                        value="{{ old('player_3_nickname') }}" placeholder="Nickname pemain"
                                        aria-label="Nickname pemain">
                                    @error('player_3_nickname')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="w-1/2 pl-2">
                                    <label for="player_3_id" class="block text-sm text-gray-600">ID Pemain</label>
                                    <input type="text" id="player_3_id" name="player_3_id"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_3_id') border border-red-500 @enderror"
                                        value="{{ old('player_3_id') }}" placeholder="ID Pemain" aria-label="ID Kapten">
                                    @error('player_3_id')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2 flex">
                                <div class="w-1/2 pr-2">
                                    <label for="player_4_nickname" class="block text-sm text-gray-600">Nickname
                                        Pemain (Player 4)</label>
                                    <input type="text" id="player_4_nickname" name="player_4_nickname"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_4_nickname') border border-red-500 @enderror"
                                        value="{{ old('player_4_nickname') }}" placeholder="Nickname pemain"
                                        aria-label="Nickname pemain">
                                    @error('player_4_nickname')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="w-1/2 pl-2">
                                    <label for="player_4_id" class="block text-sm text-gray-600">ID Pemain</label>
                                    <input type="text" id="player_4_id" name="player_4_id"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_4_id') border border-red-500 @enderror"
                                        value="{{ old('player_4_id') }}" placeholder="ID Pemain" aria-label="ID Kapten">
                                    @error('player_4_id')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2 flex">
                                <div class="w-1/2 pr-2">
                                    <label for="player_5_nickname" class="block text-sm text-gray-600">Nickname
                                        Pemain (Player 5)</label>
                                    <input type="text" id="player_5_nickname" name="player_5_nickname"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_5_nickname') border border-red-500 @enderror"
                                        value="{{ old('player_5_nickname') }}" placeholder="Nickname pemain"
                                        aria-label="Nickname pemain">
                                    @error('player_5_nickname')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="w-1/2 pl-2">
                                    <label for="player_5_id" class="block text-sm text-gray-600">ID Pemain</label>
                                    <input type="text" id="player_5_id" name="player_5_id"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_5_id') border border-red-500 @enderror"
                                        value="{{ old('player_5_id') }}" placeholder="ID Pemain" aria-label="ID Kapten">
                                    @error('player_5_id')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2 flex">
                                <div class="w-1/2 pr-2">
                                    <label for="player_alternative_nickname" class="block text-sm text-gray-600">Nickname
                                        Pemain Cadangan (opsional)</label>
                                    <input type="text" id="player_alternative_nickname"
                                        name="player_alternative_nickname"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_alternative_nickname') border border-red-500 @enderror"
                                        value="{{ old('player_alternative_nickname') }}" placeholder="Nickname pemain"
                                        aria-label="Nickname pemain">
                                    @error('player_alternative_nickname')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="w-1/2 pl-2">
                                    <label for="player_alternative_id" class="block text-sm text-gray-600">ID
                                        Pemain Cadangan (opsional)</label>
                                    <input type="text" id="player_alternative_id" name="player_alternative_id"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('player_alternative_id') border border-red-500 @enderror"
                                        value="{{ old('player_alternative_id') }}" placeholder="ID Pemain"
                                        aria-label="ID Kapten">
                                    @error('player_alternative_id')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-6">
                                @if ($data->type == 'premium')
                                    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4"
                                        role="alert">
                                        <p class="font-bold">Info Pendaftaran:</p>
                                        <p>Penting! Untuk melanjutkan pendaftaran, Anda akan dikenakan biaya sebesar
                                            <b>{{ currencyIDR($data->price) }}</b>
                                            per tim.
                                        </p>
                                    </div>
                                @endif

                                <button class="px-4 py-2 text-white font-light tracking-wider bg-blue-600 rounded"
                                    type="submit">Registrasi sekarang</button>
                            </div>
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </main>

@endsection
@section('script')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@endsection
