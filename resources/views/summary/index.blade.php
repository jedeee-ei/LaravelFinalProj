@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <!-- Overall Statistics -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <h2 class="display-4">{{ $totalStudents }}</h2>
                    <p class="mb-0">Registered in the system</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Classes</h5>
                    <h2 class="display-4">{{ $totalClasses }}</h2>
                    <p class="mb-0">Active classes</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Present Today</h5>
                    <h2 class="display-4">{{ $presentToday }}</h2>
                    <p class="mb-0">Students in attendance</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Today's Attendance Summary -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Today's Attendance Overview</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <h6>Present</h6>
                                <h3 class="text-success">{{ $presentToday }}</h3>
                                @if($totalStudents > 0)
                                    <p>{{ round(($presentToday / $totalStudents) * 100, 1) }}%</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <h6>Absent</h6>
                                <h3 class="text-danger">{{ $absentToday }}</h3>
                                @if($totalStudents > 0)
                                    <p>{{ round(($absentToday / $totalStudents) * 100, 1) }}%</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <h6>Late</h6>
                                <h3 class="text-warning">{{ $lateToday }}</h3>
                                @if($totalStudents > 0)
                                    <p>{{ round(($lateToday / $totalStudents) * 100, 1) }}%</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Class Distribution -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Class Distribution</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Class Name</th>
                                    <th>Number of Students</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classDistribution as $class)
                                <tr>
                                    <td>{{ $class->name }}</td>
                                    <td>{{ $class->students_count }}</td>
                                    <td>
                                        @if($totalStudents > 0)
                                            {{ round(($class->students_count / $totalStudents) * 100, 1) }}%
                                        @else
                                            0%
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Weekly attendance chart
    const ctx = document.getElementById('weeklyAttendanceChart').getContext('2d');
    const weeklyData = @json($weeklyAttendance);

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(weeklyData),
            datasets: [
                {
                    label: 'Present',
                    data: Object.values(weeklyData).map(day => day.present),
                    borderColor: '#28a745',
                    fill: false
                },
                {
                    label: 'Absent',
                    data: Object.values(weeklyData).map(day => day.absent),
                    borderColor: '#dc3545',
                    fill: false
                },
                {
                    label: 'Late',
                    data: Object.values(weeklyData).map(day => day.late),
                    borderColor: '#ffc107',
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
@endsection
