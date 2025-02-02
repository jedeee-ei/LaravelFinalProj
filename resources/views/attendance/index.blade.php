@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Attendance Management</h2>
        <div>
            <input type="date" class="form-control" id="attendanceDate" value="{{ date('Y-m-d') }}">
        </div>
    </div>

    <div class="row">
        @foreach($classes as $class)
        <div class="col-md-4 mb-4">
            <div class="card card-stats">
                <div class="card-body">
                    <h5 class="card-title">{{ $class->name }}</h5>
                    <p class="card-text">
                        <small>Code: {{ $class->code }}</small><br>
                        <small>Students: {{ $class->students->count() }}</small>
                    </p>
                    <a href="{{ route('attendance.show', ['class' => $class, 'date' => date('Y-m-d')]) }}"
                       class="btn btn-primary w-100">
                        Mark Attendance
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
