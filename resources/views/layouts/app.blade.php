<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @isset ($css)
        @foreach ($css as $style)
            <link rel="stylesheet" href='{{ asset("css/$style.css") }}'>
        @endforeach
    @endisset
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @isset ($js)
        @foreach ($js as $javascript)
            <script src="{{ asset("js/$javascript.js") }}"></script>
        @endforeach
    @endisset
</head>
<body>
    <div id="app">
        @include('components.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
