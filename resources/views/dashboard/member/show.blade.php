@extends('layouts.dashboard')
@section('title', 'Detail Member')
@section('content')
<main class="w-full flex-grow p-6">
    <div class="flex items-center justify-between mb-6">
        <!-- Left side - Title -->
        <h1 class="text-3xl text-black">@yield('title')</h1>
    </div>


    <div class="w-full mt-6">

        <div class="bg-white overflow-auto p-4">
            <div id="user-details" class="grid grid-cols-2 gap-4">
                <!-- User Name -->
                <div class="mb-4">
                    <div class="text-lg font-semibold mb-2">Name:</div>
                    <div id="user-name" class="text-gray-800">{{ $data->name }} </div>
                </div>

                <!-- User Email -->
                <div class="mb-4">
                    <div class="text-lg font-semibold mb-2">Email:</div>
                    <div id="user-email" class="text-gray-800">{{ $data->email }} </div>
                </div>
            </div>

        </div>
    </div>

</main>

@endsection