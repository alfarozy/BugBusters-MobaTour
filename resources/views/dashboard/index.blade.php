@extends('layouts.dashboard')
@section('title', 'Moba tourney')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-bold mb-2">Pengguna</h2>
                <p class="text-gray-700">2.134</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-bold mb-2">Turnamen</h2>
                <p class="text-gray-700">2.134</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-bold mb-2">Registrasi turnamen</h2>
                <p class="text-gray-700">2.134</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-bold mb-2">Profit</h2>
                <p class="text-gray-700">2.134</p>
            </div>

        </div>

        <div class="mt-4">
            <h2 class="text-xl font-bold mb-2">Grafik pendaftaran</h2>
            <div class="w-full bg-white rounded-lg shadow p-3" style="height: 60vh">
                <!-- Char Goes Here -->
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var lineChartEl = document.getElementById('myChart').getContext('2d');

        var lineChart = new Chart(lineChartEl, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'Premium Registrations',
                    borderColor: 'rgb(252,108,4)',
                    data: [200, 300, 250, 350, 400], // Update with your premium registration data
                    fill: false,
                }, {
                    label: 'Free Registrations',
                    borderColor: 'rgb(44,124,236)',
                    data: [300, 400, 350, 450, 600], // Update with your free registration data
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Monthly Registrations Line Chart'
                },
                scales: {
                    x: {
                        type: 'category',
                        position: 'bottom',
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true
                        }
                    }
                }
            }
        });
    </script>
@endsection
