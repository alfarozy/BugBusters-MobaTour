<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Mobastore - @yield('title')
    </title>
    <link rel="shortcut icon" href="/image/logo.svg" type="image/x-icon" />
    <link rel="stylesheet" href="/homepage/assets/css/animate.css" />
    <link rel="stylesheet" href="/homepage/assets/css/tailwind.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <!-- ==== WOW JS ==== -->
    <script src="/homepage/assets/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    @livewireStyles
</head>

<body>
    @include('layouts.homepage.nav')

    {{ $slot }}


    <footer class="wow fadeInUp relative z-10 bg-[#090E34]" data-wow-delay=".15s">

        <div class="mt-12 border-t bg-[#8890A4] border-opacity-40 py-8 lg:mt-[60px]">
            <div class="container">
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4 md:w-2/3 lg:w-1/2">
                        <div class="my-1">
                            <div class="-mx-3 flex items-center justify-center md:justify-start">
                                <a href="javascript:void(0)"
                                    class="px-3 text-base text-gray-7 hover:text-white hover:underline">
                                    Copyright Mobatourney.id
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    @livewireScripts

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script>
        //  responsive navbar
        let navbarToggler = document.querySelector("#navbarToggler");
        const navbarCollapse = document.querySelector("#navbarCollapse");

        navbarToggler.addEventListener("click", () => {
            navbarToggler.classList.toggle("navbarTogglerActive");
            navbarCollapse.classList.toggle("hidden");
        });

        // close navbar-collapse when a  clicked
        document
            .querySelectorAll("#navbarCollapse ul li:not(.submenu-item) a")
            .forEach((e) =>
                e.addEventListener("click", () => {
                    navbarToggler.classList.remove("navbarTogglerActive");
                    navbarCollapse.classList.add("hidden");
                })
            );


        //  wow js
        new WOW().init();
    </script>
</body>

</html>
