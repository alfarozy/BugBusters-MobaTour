@extends('layouts.dashboard')
@section('title', 'Data Admin')
@section('content')
    <main class="w-full flex-grow p-6">
        <div class="flex items-center justify-between mb-6">
            <!-- Left side - Title -->
            <h1 class="text-3xl text-black">@yield('title')</h1>

            <!-- Right side - Tambah Data button -->
            <a href="{{ route('admin.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm">
                <i class="fas fa-plus mr-2"></i> Tambah Data
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

            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th width="5%" class="text-left py-3 px-4 uppercase font-semibold text-sm">No.</th>
                            <th width="30%" class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                            <th width="30%" class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                            <th width="15%" class="text-center py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th width="20%" class="text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $item->name }}</td>
                                <td class="text-left py-3 px-4">{{ $item->email }}</td>
                                <td class="text-center py-3 px-4">
                                    @if ($item->is_active == 1)
                                        <span
                                            class="w-100 bg-green-500 text-white px-3 py-1 text-xs rounded-full ml-2">Aktif</span>
                                    @else
                                        <span class="w-100 bg-red-500 text-white px-3 py-1 text-xs rounded-full ml-2">Tidak
                                            Aktif</span>
                                    @endif
                                </td>
                                <td class="text-center py-3 px-4">
                                    {{-- Tombol Edit --}}
                                    @if (Auth()->guard('admin')->id() != $item->id)
                                        <a href="{{ route('admin.edit', $item->id) }}"
                                            class="bg-blue-500 mx-2 text-white px-4 py-2 rounded-md text-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- Tombol Hapus --}}
                                        @if ($item->is_active == 1)
                                            <a href="{{ route('admin.setActive', $item->id) }}"
                                                class="bg-red-500 mx-2 text-white px-4 py-2 rounded-md text-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.setActive', $item->id) }}"
                                                class="bg-green-500 mx-2 text-white px-4 py-2 rounded-md text-sm">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        @endif
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
