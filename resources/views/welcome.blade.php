<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testing responsive navbar </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/css/uikit-core-rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="/dashboard/css/style.css">
</head>

<body>
    <div class="uk-background-white">
        <nav class="uk-navbar-container">
            <div class="uk-container">
                <div uk-navbar>
                    <div class="uk-navbar-left" uk-toggle="target: #sidebar">
                        <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#"></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div id="sidebar" uk-offcanvas="mode: push; overlay: false;" class="uk-offcanvas uk-open">
        <div class="uk-offcanvas-bar uk-background-primary">
            <div class="uk-align-center">
                <h3 class="">Moba Tourney</h3>
            </div>
            <ul class="uk-nav uk-nav-default">
                <li class="uk-active"><a href="#">Dashboard</a></li>
                <li><a href="#">Inbox</a></li>
                <li><a href="#">Calendar</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#">Account</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
    </div>

    <main>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
            <h3 class="uk-card-title">Default</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit-icons.min.js"></script>
    <script src="/dashboard/js/script.js"></script>

    <script>
        UIkit.offcanvas('#sidebar').show();
    </script>
</body>

</html>
