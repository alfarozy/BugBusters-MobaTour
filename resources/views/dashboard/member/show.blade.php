@extends('layouts.dashboard')
@section('title', 'Detail Member')
@section('content')
<main class="w-full flex-grow p-6">
    <div class="flex items-center justify-between mb-6">
        <!-- Left side - Title -->
        <h1 class="text-3xl text-black">@yield('title')</h1>
    </div>


    <div class="bg-white p-6 rounded-lg shadow-md">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- User Name -->
            <div>
                <label for="user-name" class="block text-sm font-semibold text-gray-600 mb-1">Name:</label>
                <div id="user-name" class="text-lg ">{{ $data->name }}</div>
            </div>

            <!-- User Email -->
            <div>
                <label for="user-email" class="block text-sm font-semibold text-gray-600 mb-1">Email:</label>
                <div id="user-email" class="text-gray-800">{{ $data->email }}</div>
            </div>
        </div>


    </div>


</main>

@endsection