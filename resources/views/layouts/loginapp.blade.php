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
        <main class="">
            @yield('content')
        </main>
    </div>
    @yield('script')
</body>
</html>
