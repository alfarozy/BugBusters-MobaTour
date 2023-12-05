<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - @yield('title')</title>
    <!-- CSS FILES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="/backoffice/css/dashboard.css">
</head>

<body>

    <!--HEADER-->
    <header id="top-head" class="uk-position-fixed">
        <div class="uk-container uk-container-expand">
            <nav class="uk-navbar uk-light" data-uk-navbar="mode:click; duration: 250">
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav">
                        <li><a style="color: black;" class="uk-navbar-toggle uk-hidden@s" data-uk-toggle
                                data-uk-navbar-toggle-icon href="#offcanvas-nav" title="Offcanvas" data-uk-tooltip></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--/HEADER-->
    <!-- LEFT BAR -->
    @include('layouts.dashboard.sidebar')
    <!-- /LEFT BAR -->
    <!-- CONTENT -->
    @yield('content')
    <!-- /CONTENT -->
    <!-- OFFCANVAS -->
    <div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
            <button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>

            @include('layouts.dashboard.menu')
        </div>
    </div>
    <!-- /OFFCANVAS -->

    <!-- JS FILES -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit-icons.min.js"></script>

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

</body>

</html>
