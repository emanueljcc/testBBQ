<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Barbacoa') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/plugins/materialize/css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/material-preloader/css/materialPreloader.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/alpha.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>
<body class="signin-page">

    {{-- content --}}
    <div id="app">
        <main class="py-4">

            <div class="loader-bg"></div>
            <div class="loader">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                        </div><div class="circle-clipper right">
                        <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                        </div><div class="circle-clipper right">
                        <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                        </div><div class="circle-clipper right">
                        <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                        </div><div class="circle-clipper right">
                        <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')

        </main>
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('assets/plugins/jquery/jquery-2.2.0.min.js') }}" defer></script> --}}
    {{-- cambiar a asset del proyecto --}}
    {{-- cambiar a asset del proyecto --}}
    {{-- cambiar a asset del proyecto --}}
    {{-- cambiar a asset del proyecto --}}
    <script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
    <script src="{{ asset('assets/plugins/materialize/js/materialize.min.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/material-preloader/js/materialPreloader.min.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.js') }}" defer></script>
    <script src="{{ asset('assets/js/alpha.min.js') }}" defer></script>
</body>
</html>
