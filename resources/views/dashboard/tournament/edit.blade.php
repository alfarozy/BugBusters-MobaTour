@extends('layouts.dashboard')
@section('title', 'Update Admin')
@section('content')
    <main class="w-full flex-grow p-6">
        <div class="flex items-center justify-between mb-6">
            <!-- Left side - Title -->
            <h1 class="text-3xl text-black">@yield('title')</h1>

            <!-- Right side - Tambah Data button -->
            <a href="{{ route('admin.index') }}" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>


        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
                <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('admin.update', $data->id) }}">
                    @csrf
                    @method('put')
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Nama</label>
                        <input
                            class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded @error('name') border border-red-500 @enderror"
                            id="name" name="name" type="text" value="{{ old('name') ?? $data->name }}"
                            placeholder="Nama Admin" aria-label="Nama">
                        @error('name')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Email</label>
                        <input
                            class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded @error('email') border border-red-500 @enderror"
                            id="email" name="email" type="text" value="{{ old('email') ?? $data->email }}"
                            placeholder="Email Admin" aria-label="Email">
                        @error('email')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="password">Password (opsional)</label>
                        <input
                            class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded @error('password') border border-red-500 @enderror"
                            id="password" name="password" type="password" placeholder="Password" aria-label="Password">
                        @error('password')
                            <small class="text-red-500">{{ $message }}</small>
                        @else
                            <small class="text-gray-500">Kosongkan jika tidak ingin memperbaharui password</small>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded"
                            type="submit">Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </main>

@endsection
