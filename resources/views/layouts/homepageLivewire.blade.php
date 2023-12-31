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
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center justify-between">
            <a href="https://flowbite.com/" class="gap-4 flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="/image/logo.svg" alt="logo" width="50px" class="header-logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Mobatourney</span>
            </a>
            <ul bg- class="flex flex-wrap items-center mb-6 text-md font-medium text-white sm:mb-0 text-white gap-4">
                <li >
                    <a href="#" class="hover:underline mx-4">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline mx-4">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline mx-4">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-white text-center dark:text-white">© 2023 <a href="" class="hover:underline">MobaTourney™</a>. All Rights Reserved.</span>
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
