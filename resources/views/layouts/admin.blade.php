<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Administration</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    <link href="{{ asset('css/default.css?v=0.1') }}" rel="stylesheet">

    <script type="module" src="{{ asset('js/default.js?v=0.3') }}"></script>
</head>
<body>

<div id="admin">

    @if(session('alert-message') && session('alert-type'))
        <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show mainAlert" role="alert">
            {!! session('alert-message') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show mainAlert" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white df" href="{{ route('admin-dashboard') }}">{{ config('app.name', 'Laravel') }}</a>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">

                <nav class="navbar navbar-expand-md">
                    <div class="container-fluid">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">{{ config('constants.site_name_long') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav d-flex flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin-pages') }}">{{ __('Pages') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin-users') }}">{{ __('Users') }}</a>
                                    </li>
                                    <hr class="my-3"/>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin-cheat-systems') }}">{{ __('Systems') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin-cheat-games') }}">{{ __('Games') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin-cheat-devices') }}">{{ __('Devices') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin-cheat-codes') }}">{{ __('Codes') }}</a>
                                    </li>
                                    <hr class="my-3"/>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">{{ __('Frontend') }}</a>
                                    </li>
                                    <hr class="my-3"/>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">{{ __('Frontend') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>

            <main class="col-md-9 col-lg-10 p-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>
</body>
</html>
