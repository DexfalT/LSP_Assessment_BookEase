<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Equipment Olahraga | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    .main {
        height: 100vh;
        box-sizing: border-box;
        display: flex; /* Use flex container to align items */
        justify-content: center; /* Center content horizontally */
        align-items: center; /* Center content vertically */
    }

    .login-image {
        width: 50%;
        height: 100vh;
        background: url('images/kok.jpg') center center / cover no-repeat;
    }

    .register-box {
        width: 50%;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        margin-right: 20px; /* Adjusted margin for spacing */
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

    /* Add the following style to adjust the error message appearance */
    .alert {
        margin-bottom: 20px; /* Adjust margin-bottom to create space between error message and form */
    }
</style>

<body>

    <div class="main">
        <div class="login-image"></div>

        <div class="register-box">
            <div class="welcome-text">Welcome to BookEase!</div>

            @if (session('status') == 'success')
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control" rows="4"></textarea>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>

            <div class="text-center">
                Already have an account? <a href="/login">Login here</a>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
