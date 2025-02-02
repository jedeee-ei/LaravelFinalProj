@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
/*
        body {
            background-color: #f0f2f5;
            padding: 2rem;
        } */

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .dashboard-header {
            margin-bottom: 2rem;
        }

        .dashboard-title {
            font-size: 2.5rem;
            color: #1a237e;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.5rem;
        }

        .students-icon {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .present-icon {
            background-color: #e8f5e9;
            color: #388e3c;
        }

        .classes-icon {
            background-color: #fce4ec;
            color: #c2185b;
        }

        .stat-title {
            font-size: 1.1rem;
            color: #555;
            font-weight: 500;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
        }

        .stat-footer {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #666;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard</h1>
        </div>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Features Section</title>
            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                }

                .features {
                    background-color: #0044cc;
                    color: #fff;
                    text-align: center;
                    padding: 50px 20px;
                }

                .section-title {
                    font-size: 18px;
                    text-transform: uppercase;
                    opacity: 0.8;
                    letter-spacing: 1px;
                }

                .main-title {
                    font-size: 36px;
                    margin: 10px 0 40px;
                }

                .features-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 30px;
                    max-width: 1200px;
                    margin: 0 auto;
                }

                .feature {
                    background: #0055ff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                    transition: transform 0.3s ease-in-out;
                }

                .feature:hover {
                    transform: translateY(-5px);
                }

                .feature i {
                    font-size: 40px;
                    margin-bottom: 15px;
                }

                .feature h3 {
                    font-size: 22px;
                    margin-bottom: 10px;
                }

                .feature p {
                    font-size: 14px;
                    line-height: 1.6;
                    opacity: 0.9;
                }
            </style>
        </head>
        <body>

            <section class="features">
                <h3 class="section-title">Student Management System</h3>
                <h2 class="main-title">SMS</h2>

                <div class="features-grid">
                    <div class="feature">
                        <i class="fas fa-users"></i>
                        <h3>Student Profiles</h3>
                        <p>Easily add, update, and manage student details such as ID, name, email, and status.</p>
                    </div>

                    <div class="feature">
                        <i class="fas fa-user-check"></i>
                        <h3>Attendance System</h3>
                        <p>Our software has an outstanding online attendance management system for students and staff.</p>
                    </div>

                    <div class="feature">
                        <i class="fas fa-clipboard-check me-2"></i>
                        <h3>Status Management</h3>
                        <p>Keep track of student enrollment status with clear visual indicators.</p>
                    </div>

                    <div class="feature">
                        <i class="fas fa-file-alt"></i>
                        <h3>Class Management</h3>
                        <p>Keeping records of every class test has never been easier with our test management system.</p>
                    </div>


                </div>
            </section>
        </body>
        </html>
        </div>
    </div>
</body>
</html>
@endsection
