<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('inititle') </title>

    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/layouts/css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/layouts/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/layouts/layout.css') }}">
</head>
<body>
    <div class="container">

        @include('template.header')

        @include('template.menu')

        <div class="col-md-12 container-fluid">

            @include('template.sidebar')

            <div class="col-md-9 content">
                @yield('content')
            </div>

        </div>
        
        @include('template.footer')

    </div>

    {{-- Style JS --}}
        <script>
            function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
            }
        </script>
</body>
</html>