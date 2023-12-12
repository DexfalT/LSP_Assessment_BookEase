<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookEase | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style> 
    .sidebar {
        background: rgb(11, 94, 88);
        color: white;
    }

    .sidebar a {
        color: #f0f0f0;
        text-decoration: none;
        display: block;
        padding: 20px 10px;
    }

    .sidebar a:hover {
        background: rgb(0, 0, 0);
    }

    .active {
        background: rgb(38, 38, 38);
        border-right: solid 10px orange;
    }
</style>

<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">BookEase</a>
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

                    @if (Auth::user()->role_id == 1)
                        <a href="dashboard" @if(request()->route()->uri == 'dashboard')class="active" @endif>Dashboard</a>
                        <a href="sportsequip" @if(request()->route()->uri == 'sportsequip')class='active' @endif>Alat Olahraga</a>
                        <a href="categories" @if(request()->route()->uri == 'categories')class='active'@endif>Categories</a>
                        <a href="users" @if(request()->route()->uri == 'users')class='active' @endif>Users</a>
                        <a href="rent-logs" @if(request()->route()->uri == 'rent-logs')class='active' @endif>Rent Log</a>
                        <a href="logout">Logout</a>
                    @else
                        <a href="profile" @if(request()->route()->uri == 'Dashboard')class='active' @endif>Profile</a>
                        <a href="logout">Logout</a>
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
