<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Barbacoa') }}</title>

    <link href="{{ asset('assets/plugins/materialize/css/materialize.min.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="{{ asset('assets/plugins/material-preloader/css/materialPreloader.min.css') }}" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/alpha.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/daterangepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body>
    {{-- PRE LOADER --}}
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
            <div class="spinner-layer spinner-spinner-teal lighten-1">
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
    {{-- PRE LOADER --}}


    <div class="mn-content fixed-sidebar">
        <header class="mn-header navbar-fixed">
            <nav class="cyan darken-1">
                <div class="nav-wrapper row">
                    <section class="material-design-hamburger navigation-toggle">
                        <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                            <span class="material-design-hamburger__layer"></span>
                        </a>
                    </section>
                    <div class="header-title col s3">
                        <span class="chapter-title">BBQ</span>
                    </div>


                    <div class="col s6 center">
                        <img src="{{asset('img/barbacoa.png')}}" alt="avatar" style="width:9.5em;margin-top: 1px;">
                    </div>


                </div>
            </nav>
        </header>


        {{-- MENU --}}
        <aside id="slide-out" class="side-nav white fixed">
            <div class="side-nav-wrapper">
                <div class="sidebar-profile">
                    <div class="sidebar-profile-image">
                        <img src="{{asset('assets/images/profile-image.png')}}" class="circle" alt="avatar">
                    </div>
                    <div class="sidebar-profile-info">
                        <a href="javascript:void(0);" class="account-settings-link">
                            <p>{{ Auth::user()->name }}</p>
                            <span>{{ Auth::user()->email }}<i class="material-icons right">arrow_drop_down</i></span>
                        </a>
                    </div>
                </div>
                <div class="sidebar-account-settings">
                    <ul>
                        <li class="no-padding">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding"><a class="waves-effect waves-grey" href="{{ route('home') }}"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="{{ route('booking') }}"><i class="material-icons">query_builder</i>Alquilar Barbacoa</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="{{ route('companies.index') }}"><i class="material-icons">apps</i>Barbacoas</a></li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">group</i>Usuarios<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('register') }}">Crear Usuario</a></li>
                                {{-- <li><a href="#">Listar usuarios</a></li> --}}
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        {{-- MENU --}}


        {{-- CONTENT --}}
        @yield('content')
        {{-- CONTENT --}}



    </div>
    <div class="left-sidebar-hover"></div>

    <!-- Javascripts -->
    {{-- <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script> --}}
    <script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
    <script src="{{ asset('assets/plugins/materialize/js/materialize.min.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/material-preloader/js/materialPreloader.min.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.js') }}" defer></script>
    <script src="{{ asset('assets/js/alpha.min.js') }}" defer></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}" defer></script>
    {{-- extras scripts --}}
    @yield('js')

</body>
</html>
