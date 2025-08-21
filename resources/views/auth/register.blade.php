<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Brand Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logofav.png') }}">
    <style>
        body {
            height: 100vh;
            background: url({{ asset('images/bg-auth.jpg') }}) no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .25);
        }

        .brand-logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="card p-4">
        <div class="text-center mb-3">
            <img src="{{ asset('images/aurahuntlogo.png') }}" alt="Logo" class="brand-logo mb-2">
            <h4 class="fw-bold">Daftar Akun</h4>
            <p class="text-muted small">Buat akun baru untuk melanjutkan</p>
        </div>

        {{-- Alert error --}}
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Alert success --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" required>
                    <span class="input-group-text" onclick="togglePassword('password', this)">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                        required>
                    <span class="input-group-text" onclick="togglePassword('password_confirmation', this)">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Daftar</button>
        </form>

        <p class="text-center mt-3 mb-0">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
        </p>
    </div>

    @include('alert')

    <script>
        function togglePassword(fieldId, el) {
            const field = document.getElementById(fieldId);
            const icon = el.querySelector('i');

            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                field.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
