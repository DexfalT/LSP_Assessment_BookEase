<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoxVoyage: Your Drone Rental Expert | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .sidebar {
            background: #03375a;
            /* Blue color */
            color: #fff;
            /* White text */
            width: 200px;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #021a2a;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logonox.png') }}" alt="Brand Logo" style="max-height: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="body-content align-items-stretch h-100">
            <div class="row d-flex g-0 h-100">
                <div style="height: auto" class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" @endif>Dashboard</a>
                            <a href="/sportsequip" @if (request()->route()->uri == 'sportsequip' ||
                                    request()->route()->uri == 'drone-add' ||
                                    request()->route()->uri == 'drone-delete/{slug}' ||
                                    request()->route()->uri == 'drone-deleted' ||
                                    request()->route()->uri == 'drone-edit/{slug}') class='active' @endif>Drones</a>
                            <a href="/categories" @if (request()->route()->uri == 'categories' ||
                                    request()->route()->uri == 'category-add' ||
                                    request()->route()->uri == 'category-delete/{slug}' ||
                                    request()->route()->uri == 'category-deleted' ||
                                    request()->route()->uri == 'category-edit/{slug}') class='active' @endif>Categories</a>
                            <a href="/users" @if (request()->route()->uri == 'users' ||
                                    request()->route()->uri == 'registered-users' ||
                                    request()->route()->uri == 'users-banned' ||
                                    request()->route()->uri == 'user-ban/{slug}' ||
                                    request()->route()->uri == 'user-detail/{slug}') class='active' @endif>Users</a>
                            <a href="/" @if (request()->route()->uri == '/') class='active' @endif>Drone List</a>
                            <a href="/drone-rent" @if (request()->route()->uri == 'drone-rent') class='active' @endif>Drone Rent</a>
                            <a href="/rent-logs" @if (request()->route()->uri == 'rent-logs') class='active' @endif>Rent Log</a>
                            <a href="/logout">Logout</a>
                        @else
                            <a href="/profile" @if (request()->route()->uri == 'Dashboard') class='active' @endif>Profile</a>
                            <a href="/" @if (request()->route()->uri == '/') class='active' @endif>Drone List</a>
                            <a href="/logout">Logout</a>
                        @endif
                    @else
                        <a href="/login">Login</a>
                    @endif
                </div>
                <div class="content p-4 col-lg-10 ">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
