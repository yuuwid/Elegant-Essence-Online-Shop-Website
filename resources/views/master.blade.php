<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- META TAGS --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Elegance Essence - @yield('title')</title>

    {{-- LOGO WEBSITE --}}
    <link rel="icon" type="image/x-icon" href="/images/root/logo.png">

    <!-- BUNNY FONTS -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Oxygen:wght@300;400;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600;700&display=swap" rel="stylesheet" />

    {{-- Tailwind CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('setup')

</head>

<body class="font-nunito">

    @yield('content')

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- owl carousel --}}
    {{-- <script src="{{ asset('js/code.jquery.com_jquery-3.7.0.min.js') }}"></script> --}}
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });
        });
    </script>

    <script>
        AOS.init();
    </script>



    {{-- script detail produk sisi kiri --}}
    <script>
        let currentImage = 0;

        const viewImage = (e, index) => {
            currentImage = index;
            document.getElementById('bigImage').src = e.querySelector('img').src;
        }

        const nextPrevious = (index) => {
            i = currentImage + index;

            let images = document.getElementById('images').querySelectorAll('img');

            if (i >= images.length || i < 0) return;

            currentImage = i;

            let arr = [];

            images.forEach(element => arr.push(element.src));

            document.getElementById('bigImage').src = arr[currentImage];
        }
    </script>




</body>

</html>
