@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row justify-content-center">
        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Class Management</h2>
                <a href="{{ route('classes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create New Class
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Students</th>
                                <th>Capacity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $class)
                            <tr>
                                <td>{{ $class->code }}</td>
                                <td>{{ $class->name }}</td>
                                <td>{{ $class->students->count() }}/{{ $class->capacity }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                             style="width: {{ ($class->students->count() / $class->capacity) * 100 }}%">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $class->status === 'active' ? 'success' : 'danger' }}">
                                        {{ $class->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('classes.edit', $class) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('attendance.show', $class) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-clipboard-check"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $classes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

