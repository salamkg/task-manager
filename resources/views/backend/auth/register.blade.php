<!DOCTYPE html>

<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <title>Авторизация</title>

{{--    <link href="/css/coreui.min.css" rel="stylesheet">--}}
{{--    <link href="/css/free.min.css" rel="stylesheet">--}}
</head>
<body class="c-app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>Registration</h1>
                        <p class="text-muted">Sign Up!</p>
                        <form action="{{route('backend.auth.register')}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">
                                    <i class="cil-envelope-closed"></i></span></div>
                                <input class="form-control" type="text" name="first_name" placeholder="First Name">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">
                                    <i class="cil-envelope-closed"></i></span></div>
                                <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">
                                    <i class="cil-envelope-closed"></i></span></div>
                                <input class="form-control" type="text" name="email" id="email" placeholder="E-mail">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"><span class="input-group-text">
                                    <i class="cil-fingerprint"></i></span></div>
                                <input class="form-control " type="password" name="password" id="password" placeholder="Password">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="submit">Register</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{--<script src="{{ mix('js/app.js') }}"></script>--}}
{{--<script src="/js/coreui.bundle.min.js"></script>--}}
{{--<script src="/js/core.js"></script>--}}

</body>
</html>
