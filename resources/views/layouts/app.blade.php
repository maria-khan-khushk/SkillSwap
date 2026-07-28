<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SkillSwap')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">

                SkillSwap

            </a>

            <div class="ms-auto d-flex align-items-center gap-2">

                @auth

                    <a href="{{ route('categories.index') }}" class="btn btn-outline-light btn-sm">
                        Categories
                    </a>

                    <a href="{{ route('skills.index') }}" class="btn btn-outline-light btn-sm">
                        Skills
                    </a>

                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm">
                        Dashboard
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">

                        @csrf

                        <button class="btn btn-danger btn-sm">

                            Logout

                        </button>

                    </form>

                @else

                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">

                        Login

                    </a>

                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">

                        Register

                    </a>

                @endauth

            </div>

        </div>

    </nav>

    <main class="container mt-4">

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>