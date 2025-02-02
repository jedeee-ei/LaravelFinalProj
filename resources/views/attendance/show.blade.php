@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Mark Attendance - {{ $class->name }}</h2>
            <div class="d-flex justify-content-between align-items-center">
                <h6>Date: {{ date('Y-m-d') }}</h6>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('attendance.store', $class) }}" method="POST">
                @csrf
                <input type="hidden" name="date" value="{{ $date }}">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <input type="radio"
                                           name="attendances[{{ $student->id }}]"
                                           value="present"
                                           class="btn-check"
                                           id="present_{{ $student->id }}"
                                           {{ $student->attendances->first()?->status === 'present' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success" for="present_{{ $student->id }}">
                                        Present
                                    </label>

                                    <input type="radio"
                                           name="attendances[{{ $student->id }}]"
                                           value="absent"
                                           class="btn-check"
                                           id="absent_{{ $student->id }}"
                                           {{ $student->attendances->first()?->status === 'absent' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-danger" for="absent_{{ $student->id }}">
                                        Absent
                                    </label>

                                    <input type="radio"
                                           name="attendances[{{ $student->id }}]"
                                           value="late"
                                           class="btn-check"
                                           id="late_{{ $student->id }}"
                                           {{ $student->attendances->first()?->status === 'late' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-warning" for="late_{{ $student->id }}">
                                        Late
                                    </label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Save Attendance</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
