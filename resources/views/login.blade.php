<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        /* Background Image */
        body {
            background: url("{{ asset('background.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Main Container */
        .container {
            max-width: 900px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .left-panel {
            background: url("{{ asset('images/bg.png') }}") no-repeat center center;
            background-size: cover;
            min-height: 500px;
            height: 100%;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .row{
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Add this for the shadow effect */
            border-radius: 12px; /* Keep the border-radius for a smooth look */
            background: rgba(255, 255, 255, 0.9); /* Ensure background remains visible */
        }


        @media (max-width: 768px) {
            .left-panel {
                display: none;
            }
        }

        .form-container {
            padding: 2.5rem;
        }


        .form-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 1rem;
        }


        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ced4da;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            border-color: #2c3e50;
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.2);
        }


        .btn-primary {
            background-color: #2c3e50;
            border: none;
            padding: 12px;
            font-weight: 500;
            text-transform: uppercase;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #1a252f;
        }


        .register-link {
            text-align: center;
            display: block;
            margin-top: 1rem;
        }

        .register-link a {
            color: #2c3e50;
            font-weight: 500;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 left-panel d-none d-md-block"></div>
            <div class="col-md-7">
                <div class="form-container">
                    <div class="logo-container">

                    </div>
                    <h2 class="form-title">Instructor Login</h2>
                    <p class="text-center text-muted">Enter your credentials to continue</p>

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required>
                        </div>


                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        <div class="register-link">
                            <span>New Instructor?</span> <a href="{{ route('register') }}">Create an Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
