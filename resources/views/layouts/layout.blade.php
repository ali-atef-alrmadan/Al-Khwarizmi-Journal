<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    @livewireStyles
    <title>{{$page_name}}</title>
</head>
<body class="bg-gray-50 font-sans antialiased">

    {{-- header start --}}
        @yield('header')
            @include('layouts.components.header')


    {{-- content start --}}
        @yield('content')

    {{-- footer start --}}
        @yield('footer')
            @include('layouts.components.footer')

    {{-- js script start --}}
        @livewireScripts
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="js/vanilla-tilt.min.js"></script>
        <script type="text/javascript">
            VanillaTilt.init(document.querySelector(".card-c"), {
                max: 25,
                speed: 400
            });
            //It also supports NodeList
            VanillaTilt.init(document.querySelectorAll(".card-c"));
        </script>
    {{-- js script end --}}

</body>
</html>
