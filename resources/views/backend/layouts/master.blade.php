<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content={{ csrf_token() }}>
    <title>@if(isset($title)) {{$title}} :: @else UNKNOWN PAGE :: @endif Admin panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Main styles for this application-->


    @stack('styles')
</head>
<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <a href="/admin" class="c-sidebar-brand d-lg-down-none">
        <strong>TaskManager</strong>
    </a>
    <ul class="c-sidebar-nav">
    </ul>
</div>
<div class="c-wrapper c-fixed-components">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/admin"><b>Dashboard</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::guard('backend')->check())
                            <li class="nav-item active">
                                <a class="nav-link" href="/admin">
                                    Welcome: Admin
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="admin/logout">Logout </a>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Login </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Register </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        @yield('content')
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md">
                        <span>
                            TM
                            <small class="d-block mb-3 text-muted">&copy; 2022</small>
                        </span>

                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>
{{--<script src="/js/coreui.bundle.min.js"></script>--}}
{{--<script src="/js/core.js?v=2"></script>--}}
@stack('scripts')

</body>
</html>
