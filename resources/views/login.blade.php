<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Equipment Drone | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    html,
    body {
        height: 100%;
        margin: 0;
    }

    .main {
        height: 100vh;
        box-sizing: border-box;
    }

    .container-fluid {
        height: 100%;
        display: flex;
        align-items: center;
    }

    .login-image {
        width: 50%;
        height: 100%;
        background: url('images/guy-drone.jpg') center center / cover no-repeat;
    }

    .login-box {
        width: 50%;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        margin-left: 20px;
    }

    form div {
        margin-bottom: 20px;
    }

    form label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        width: 100%;
    }

    .text-center a {
        color: #007bff;
    }

    .welcome-text {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .logo-image {
        text-align: center;
        margin-bottom: 40px;
    }

    .logo-image img {
        max-width: 50%;
        height: auto;
        max-height: 100px; 
    }
</style>

<body>

    <div class="main">
        <div class="container-fluid">
            <div class="login-image"></div>
            <div class="login-box">
                <div class="logo-image">
                    <img src="{{ asset('images/logonox.png') }}" alt="Nox Voyage Logo">
                </div>
                <div class="welcome-text">Welcome to Nox Voyage!</div>

                @if (session('status'))
                <div class="alert alert-danger d-flex justify-content-center">
                    {{ session('message') }}
                </div>
                @endif

                <form action="" method="post">
                    @csrf
                    <div>
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                    <div class="text-center">
                        Don't have an account yet? <a href="register">Sign Up here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
