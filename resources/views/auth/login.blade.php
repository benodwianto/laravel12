<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logofav.png') }}">
    <style>
        body {
            height: 100vh;
            background: url({{ asset('images/bg-auth.jpg') }}) no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .login-card {
            position: relative;
            z-index: 2;
            max-width: 380px;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .brand-logo {
            width: 70px;
            margin-bottom: 1rem;
        }

        .toggle-password {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="login-card text-center">
        <!-- Logo Brand -->
        <img src="{{ asset('images/aurahuntlogo.png') }}" alt="Logo" class="brand-logo">

        <h4 class="mb-4 fw-bold">Selamat Datang</h4>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" id="password" class="form-control" name="password" placeholder="Password"
                    required>
                <span class="input-group-text toggle-password" onclick="togglePassword()">
                    <i id="toggleIcon" class="bi bi-eye-slash"></i>
                </span>
            </div>

            <button class="btn btn-primary w-100" type="submit">Login</button>
        </form>

        <p class="mt-3 mb-0 text-dark">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    </div>

    @include('alert')

    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const icon = document.getElementById("toggleIcon");

            if (password.type === "password") {
                password.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                password.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }
        }
    </script>
</body>

</html>
