<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course Listing Platform</title>
    @vite('resources/sass/app.scss')
</head>

<body>

    <section id="header" class="border">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="{{ url('/') }}">Course Listing</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ url('/') }}">Home</a>
                                    </li>
                                    @auth
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('home') }}">{{ auth()->user()->name }}
                                                (Dashboard)</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Post Your Course</a>
                                        </li>
                                    @endauth

                                </ul>
                                <form class="d-flex" role="search" action="{{ route('frontend.home') }}">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search" name="search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    @yield('content')

    @vite('resources/js/app.js')
</body>

</html>
