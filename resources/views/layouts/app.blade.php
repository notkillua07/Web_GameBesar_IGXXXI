<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" 
        referrerpolicy="no-referrer">
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}">

    <style>
        /* Bootstrap Icon */
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");

        body{
            background: url('{{ asset('assets') }}/Background.png') top / cover no-repeat;
            background-attachment: fixed;
        }
        nav{
            background-color: #7DC1E3;
        }
        .navbarLogo{
            max-width: 100%;
            max-height: 100%;
        }
        .nav-link{
            color: #FFFFFF;
            font-size: 1.2em;
        }
        .nav-link:hover{
            background: #FFFFFF;
            border-radius: 5px;
            box-shadow: 
        }
    </style>
</head>
<body>
    <div id="app">
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-sm shadow-sm">
            <div class="container">
                {{-- Navbar Logo --}}
                <a class="navbar-brand" href=" ">
                    <img class="navbarLogo" src="/assets/IG_Logo.png">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        {{-- Note dari wensel: sing guest2 ini mau tak ilangi sakjane, mek e gtw, penting opo gk e iki? wkwkwk --}}

                        {{-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}</a>
                                </li>
                            @endif
                        @endguest --}}

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- End Navbar --}}

        <main class="">
            @yield('content')
        </main>
    </div>
    @yield('script')
</body>
</html>
