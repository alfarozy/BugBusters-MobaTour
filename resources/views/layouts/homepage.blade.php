<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" href="/image/favicon.png">
    <!-- CSS FILES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="/member/css/style.css">
</head>

<body>
    <!-- TOP -->
    <div class="top-wrap uk-position-relative uk-light uk-background-default">

        <!-- NAV -->
        <div class="nav"
            data-uk-sticky="cls-active: uk-background-default uk-box-shadow-medium; top: 100vh; animation: uk-animation-slide-top">
            <div class="uk-container">
                <nav class="uk-navbar uk-navbar-container uk-navbar-transparent " data-uk-navbar>
                    <div class="uk-navbar-left">
                        <div class="uk-navbar-item uk-padding-remove-horizontal">
                            <a class="uk-logo" title="Logo" href=""><img src="/image/logo.svg"
                                    alt="Logo"></a>
                        </div>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav uk-visible@s">
                            <li class="uk-active"><a href="">Beranda</a></li>
                            <li><a href="#about">Tentang kami</a></li>
                            <li><a href="">Turnamen</a></li>
                            <li><a class="uk-button" href="">Login</a></li>
                        </ul>
                        <a class="moba-text-primary uk-navbar-toggle uk-navbar-item uk-hidden@s" data-uk-toggle
                            data-uk-navbar-toggle-icon href="#offcanvas-nav"></a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- /NAV -->


        <div class="uk-cover-container uk-flex uk-flex-middle top-wrap-height">
            <div class="uk-container uk-flex-auto top-container uk-position-relative uk-margin-medium-top"
                data-uk-parallax="y: 0,50; easing:0; opacity:0.2">
                <div class="uk-flex uk-flex-wrap uk-child-width-expand@s">
                    <div class="uk-width-1-2@s uk-margin-large-top"
                        data-uk-scrollspy="cls: uk-animation-slide-right-medium; target: > *; delay: 150">
                        <h1 class="uk-margin-top moba-text-primary">Moba Tourney</h1>
                        <p class="subtitle-text" style="color: black;">Platform penyedia jadwal turnamen
                            online</p>
                    </div>
                    <div class="uk-width-1-4@s uk-align-center">
                        <!-- Add your image here -->
                        <img src="../image/hero-banner.svg" alt="Mobatourney" class="uk-width-1-1 uk-margin-small-top">
                    </div>
                </div>
            </div>
        </div>


    </div>

    @yield('content')
    <!-- FOOTER -->
    <footer class="uk-section-primary uk-padding">
        <div class="uk-text-center">
            <span class="uk-text-small uk-text-muted"> &copy; Copyright 2023 | Moba Tourney</span>
        </div>
    </footer>
    <!-- /FOOTER -->
    <!-- OFFCANVAS -->
    <div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: false">
        <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
            <button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>
            <ul class="uk-nav uk-nav-default">
                <li class="uk-active"><a href="">Beranda</a></li>
                <li><a href="#about">Tentang kami</a></li>
                <li><a href="">Turnamen</a></li>
                <li><a class="uk-button" href="">Login</a></li>
            </ul>
        </div>
    </div>
    <!-- /OFFCANVAS -->

    <!-- JS FILES -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@latest/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@latest/dist/js/uikit-icons.min.js"></script>
</body>

</html>
