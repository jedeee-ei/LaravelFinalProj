@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Class: {{ $class->name }}</h4>
                    <a href="{{ route('classes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Classes
                    </a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('classes.update', $class) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Class Name</label>
                            <input type="text" name="name" value="{{ old('name', $class->name) }}" class="form-control">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="code" class="form-label">Class Code</label>
                            <input type="text" name="code" value="{{ old('code', $class->code) }}" class="form-control">
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label">Class Capacity</label>
                            <input type="number" name="capacity" value="{{ old('capacity', $class->capacity) }}" class="form-control">
                            @error('capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{ old('status', $class->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $class->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            {{-- <select class="form-select @error('status') is-invalid @enderror"
                                    id="status"
                                    name="status">
                                <option value="active" {{ $class->status === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $class->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select> --}}
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Manage Students</label>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="studentSearch"
                                               placeholder="Search students...">
                                    </div>
                                    <div class="student-list" style="max-height: 300px; overflow-y: auto;">
                                        @foreach($students as $student)
                                            <div class="form-check student-item mb-2">
                                                <input class="form-check-input"
                                                type="checkbox"
                                                name="student_ids[]"
                                                value="{{ $student->id }}"
                                                id="student_{{ $student->id }}"
                                                {{ in_array($student->id, old('student_ids', $class->students->pluck('id')->toArray())) ? 'checked' : '' }}>

                                                {{-- <input class="form-check-input"
                                                       type="checkbox"
                                                       name="student_ids[]"
                                                       value="{{ $student->id }}"
                                                       id="student_{{ $student->id }}"
                                                       {{ in_array($student->id, old('student_ids', $class->students->pluck('id')->toArray())) ? 'checked' : '' }}> --}}
                                                <label class="form-check-label" for="student_{{ $student->id }}">
                                                    {{ $student->name }} ({{ $student->student_id }})
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Class
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
