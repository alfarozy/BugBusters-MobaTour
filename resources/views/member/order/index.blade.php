@extends('layouts.member')
@section('title', 'History transaksi')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
@endsection
@section('content')
    <main class="w-full flex-grow p-6">
        <div class="flex items-center justify-between mb-6">
            <!-- Left side - Title -->
            <h1 class="text-3xl text-black">@yield('title')</h1>
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
                            <th width="5%" class="text-left py-3 px-4 uppercase font-semibold text-sm">Invoice</th>
                            <th width="30%" class="text-left py-3 px-4 uppercase font-semibold text-sm">Turnamen</th>
                            <th width="15%" class="text-left py-3 px-4 uppercase font-semibold text-sm">Nominal</th>
                            <th width="19%" class="text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal</th>
                            <th width="19%" class="text-center py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th width="15%" class="text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $item->invoice }}</td>
                                <td class="text-left py-3 px-4">{{ $item->tournament->title }}</td>
                                <td class="text-left py-3 px-4">{{ currencyIDR($item->price) }}</td>
                                <td class="text-left py-3 px-4">
                                    <small>{{ $item->order_date }}</small>
                                </td>
                                <td class="text-center py-3 px-4">
                                    @if ($item->status == 'PAYMENT_ACCEPTED')
                                        <span
                                            class="w-100 bg-green-500 text-white px-3 py-1 text-xs rounded-full ml-2">Success</span>
                                    @elseif($item->status == 'EXPIRED')
                                        <span
                                            class="w-100 bg-yellow-500 text-white px-3 py-1 text-xs rounded-full ml-2">Expired</span>
                                    @elseif($item->status == 'UNPAID')
                                        <span
                                            class="w-100 bg-yellow-500 text-white px-3 py-1 text-xs rounded-full ml-2">Unpaid</span>
                                    @else
                                        <span class="w-100 bg-red-500 text-white px-3 py-1 text-xs rounded-full ml-2">Cancel
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center py-3 px-4">
                                    <a href="{{ route('orders.show', $item->invoice) }}"
                                        class="bg-blue-500 mx-2 text-white px-4 py-2 rounded-md text-sm">
                                        <i class="fas fa-address-card"></i>
                                    </a>
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
