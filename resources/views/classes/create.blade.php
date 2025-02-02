@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Create New Class</h4>
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

                    <form action="{{ route('classes.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Class Name</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Enter class name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="code" class="form-label">Class Code</label>
                            <input type="text"
                                   class="form-control @error('code') is-invalid @enderror"
                                   id="code"
                                   name="code"
                                   value="{{ old('code') }}"
                                   placeholder="Enter class code (e.g., CS101)">
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label">Class Capacity</label>
                            <input type="number"
                                   class="form-control @error('capacity') is-invalid @enderror"
                                   id="capacity"
                                   name="capacity"
                                   value="{{ old('capacity') }}"
                                   min="1"
                                   placeholder="Enter maximum number of students">
                            @error('capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                        </div>

                        <div class="mb-3">
                            <label class="form-label">Select Students</label>
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
                                                       {{ in_array($student->id, old('student_ids', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="student_{{ $student->id }}">
                                                    {{ $student->name }} ({{ $student->student_id }})
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer bg-light">
                                    <small class="text-muted">
                                        Selected: <span id="selectedCount">0</span> students
                                    </small>
                                    <button type="button"
                                            class="btn btn-sm btn-outline-primary float-end"
                                            onclick="toggleAllStudents()">
                                        Toggle All
                                    </button>
                                </div>
                            </div>
                            @error('student_ids')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            @if ($errors->has('student_ids'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('student_ids') }}
                                </div>
                             @endif
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Class
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Student search functionality
    const searchInput = document.getElementById('studentSearch');
    const studentItems = document.querySelectorAll('.student-item');

    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();

        studentItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });

    // Update selected count
    updateSelectedCount();

    const checkboxes = document.querySelectorAll('input[name="student_ids[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCount);
    });
});

function updateSelectedCount() {
    const selected = document.querySelectorAll('input[name="student_ids[]"]:checked').length;
    document.getElementById('selectedCount').textContent = selected;
}

function toggleAllStudents() {
    const checkboxes = document.querySelectorAll('input[name="student_ids[]"]');
    const visibleCheckboxes = Array.from(checkboxes).filter(checkbox =>
        checkbox.closest('.student-item').style.display !== 'none'
    );

    const allChecked = visibleCheckboxes.every(checkbox => checkbox.checked);

    visibleCheckboxes.forEach(checkbox => {
        checkbox.checked = !allChecked;
    });

    updateSelectedCount();
}

// Capacity validation
const capacityInput = document.getElementById('capacity');
capacityInput.addEventListener('input', function() {
    if (this.value < 1) {
        this.value = 1;
    }
});
</script>
@endsection
