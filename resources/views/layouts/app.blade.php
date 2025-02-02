<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
            .sidebar {
                min-height: 100vh;
                background: #2c3e50;
                color: white;
            }
            .nav-link {
                color: rgba(255,255,255,0.8);
            }
            .nav-link:hover {
                color: white;
                background: rgba(255,255,255,0.1);
            }
            .nav-link.active {
                background: rgba(255,255,255,0.2);
                color: white;
            }
            .card-stats {
                transition: transform 0.2s;
            }
            .card-stats:hover {
                transform: translateY(-5px);
            }

            body, html {
                margin: 0;
                padding: 0;
                height: 100%;
                display: flex;
                flex-direction: column;
            }
            .main-container {
                display: flex;
                justify-content: center;
                align-items: center;
                flex: 1;
                padding: 20px;
            }

            .d-flex {
                display: flex;
                align-items: center;
            }

            .gap-1 > * {
                margin-right: 5px; /* Adjust spacing between buttons */
            }

            .gap-1 > *:last-child {
                margin-right: 0;
            }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 px-0 sidebar">
                <div class="p-4">
                    <h4 class="text-center">SMS</h4>
                </div>
                <div class="nav flex-column">
                    <a href="{{ route('dashboard') }}" class="nav-link p-3 {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                    <a href="{{ route('students.index') }}" class="nav-link p-3 {{ Request::is('students*') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate me-2"></i> Students
                    </a>
                    <a href="{{ route('classes.index') }}" class="nav-link p-3 {{ Request::is('classes*') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard me-2"></i> Classes
                    </a>
                    <a href="{{ route('attendance.index') }}" class="nav-link p-3 {{ Request::is('attendance*') ? 'active' : '' }}">
                        <i class="fas fa-clipboard-check me-2"></i> Attendance
                    </a>
                    <a href="{{ route('summary.index') }}" class="nav-link p-3 {{ Request::is('summary*') ? 'active' : '' }}">
                        <i class="fas fa-id-badge" style='font-size:20px;padding-right: 8px'></i> Reports
                    </a>
                    <a href="{{ route('login')}}" class="nav-link p-3"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" style='font-size:20px;padding-right: 8px'></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                        @csrf
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 bg-light">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
