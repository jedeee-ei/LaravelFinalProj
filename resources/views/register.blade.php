<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Teacher Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            max-width: 450px;
            width: 100%;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo-image {
            max-width: 120px;
            height: auto;
        }

        .form-title {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ccc;
            background-color: #f8f9fa;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }

        .btn-primary {
            background-color: #1a252f;
            border: none;
            padding: 12px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #1a252f;
        }

        .text-muted {
            font-size: 0.9rem;
        }

        .login-link {
            color: #1a252f;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 500px) {
            .form-container {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h4 class="form-title">Create Your Account</h4>
        <p class="text-center text-muted"></p>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" required minlength="6">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control"
                       id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="d-grid gap-2 mb-4">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            <div class="text-center">
                <span class="text-muted">Already have an account?</span>
                <a href="{{ route('login') }}" class="login-link ms-1">Login here</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
