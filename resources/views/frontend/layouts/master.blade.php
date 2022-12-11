
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Frontend</title>

    <!-- Bootstrap core CSS -->
{{--    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">--}}

    <!-- Custom styles for this template -->
{{--    <link href="pricing.css" rel="stylesheet">--}}
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand" href="/"><b>Task Manager</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::guard('frontend')->check())
                            <li class="nav-item active">
                                <a class="nav-link link-primary" href="/task">Create Task </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link link-primary" href="/logout">Logout </a>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('frontend.auth.form')}}">Login </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('frontend.auth.register')}}">Register </a>
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


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>--}}
{{--<script src="../../assets/js/vendor/popper.min.js"></script>--}}
{{--<script src="../../dist/js/bootstrap.min.js"></script>--}}
{{--<script src="../../assets/js/vendor/holder.min.js"></script>--}}
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
