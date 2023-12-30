@extends('layouts.dashboard')
@section('title', 'List Pemain')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
@endsection
@section('content')
    <main class="w-full flex-grow p-6">
        <div class="flex items-center justify-between mb-6">
            <!-- Left side - Title -->
            <h1 class="text-3xl text-black">@yield('title')</h1>

            <!-- Right side - Tambah Data button -->
            <a href="{{ route('tournament.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm">
                <i class="fas fa-plus mr-2"></i> Pemain Baru
            </a>
        </div>


        <div class="w-full mt-6">
            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-200 text-red-800 p-4 mb-4 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-auto p-4">
                <table id="table" class="min-w-full bg-white pt-4">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th width="5%" class="text-left py-3 px-4 uppercase font-semibold text-sm">No.</th>
                            <th width="25%" class="text-left py-3 px-4 uppercase font-semibold text-sm">Tournament
                            </th>
                            <th width="20%" class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                            <th width="15%" class="text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal
                                Pendaftaran
                            </th>
                            <th width="15%" class="text-center py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th width="20%" class="text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $item->title }}</td>
                                <td class="text-left py-3 px-4">{{ $item->schedule_date }}</td>
                                <td class="text-left py-3 px-4">
                                    @if ($item->type == 'free')
                                        <span class="w-100 text-green-500 text-xs "><b>Pendaftaran
                                                Gratis</b></span>
                                    @else
                                        <span class="w-100 text-blue-500 text-xs "><b>Premium
                                                <br> {{ currencyIDR($item->price) }} / Team</b>
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center py-3 px-4">
                                    @if ($item->is_active)
                                        <span
                                            class="w-100 bg-green-500 text-white px-3 py-1 text-xs rounded-full">Aktif</span>
                                    @else
                                        <span class="w-100 bg-red-500 text-white px-3 py-1 text-xs rounded-full">Tidak
                                            aktif
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center py-3 px-4">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('tournament.edit', $item->id) }}"
                                        class="bg-blue-500 mx-2 text-white px-4 py-2 rounded-md text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- Tombol Hapus --}}
                                    @if ($item->is_active == 1)
                                        <a href="{{ route('tournament.setActive', $item->id) }}"
                                            class="bg-red-500 mx-2 text-white px-4 py-2 rounded-md text-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('tournament.setActive', $item->id) }}"
                                            class="bg-green-500 mx-2 text-white px-4 py-2 rounded-md text-sm">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        <!-- ... other rows ... -->
                    </tbody>
                </table>
            </div>
        </div>

    </main>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#table');
    </script>
@endsection
