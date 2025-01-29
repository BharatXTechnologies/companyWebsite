<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ? $title : 'Zero1infinity Innovations A Software Solution Company' }}</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/mdb.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/bootsrap_icon/bootstrap-icons.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/js/jquery-3.7.1.min.js') }}"/>
</head>
<body>
    @include('Frontend.Common.header')
    @yield('section')
    @include('Frontend.Common.footer')
    <script src="{{ URL::asset('frontend/assets/js/mdb.umd.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/mdb.min.js') }}"></script>
    <!-- Navbar Scroll Effect -->
    <script>
        window.addEventListener("scroll", function() {
            let navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>
</body>
</html>