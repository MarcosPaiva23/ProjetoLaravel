<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spofify CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home" style="color: white">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="80" height="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../home">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Bands
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../bands">View Bands</a></li>
                            <li><a class="dropdown-item" href="../add-band">Add Bands</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Albums
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../add-album">Add Albums</a></li>
                        </ul>
                    </li>
                </ul>
                @if (Route::has('login'))
                    @auth
                        <div class="d-flex align-items-center">
                            <a href="{{ url('/dashboard-home') }}" class="btn btn-success me-2">BackOffice</a>
                            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="btn btn-success">Logout</button>
                            </form>
                        </div>
                    @else
                        <div class="d-flex align-items-center">
                            <a href="{{ route('login') }}" class="btn btn-success me-2">Login</a>
                            @if (Route::has('users.add'))
                                <a href="{{ route('users.add') }}" class="btn btn-success">Register</a>
                            @endif
                        </div>
                    @endauth
                @endif

            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
