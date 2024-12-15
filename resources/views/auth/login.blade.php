<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding:0;
            height:600px;
        }
        .image-section {
            background: url('../../logInImage.png') no-repeat center;
            background-size: cover;
        }
        .logo img {
            width:90%;
            margin:20px auto;
        }
    </style>
</head>
<body>
    <div class="container row mx-auto w-75">
        <div class="col-md-6 p-5 d-flex flex-column">
            <div class="logo text-center mb-4">
                <img src="{{asset('EnetLogo.png')}}" alt="Logo">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-primary text-decoration-none">Forgot your password?</a>
                    @endif
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 image-section d-none d-md-block">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
