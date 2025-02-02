<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

// StudentController.php
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'student_id' => 'required|string|unique:students'
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'student_id' => 'required|string|unique:students,student_id,' . $student->id,
            'status' => 'required|in:active,inactive'
        ]);

        $student->update([
            'name' => $validated ['name'],
            'email' => $validated['email'],
            'student_id' => $validated ['student_id'],
            'status' => $validated ['status'],
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully');
        }


        // public function destroy(Student $student)
        // {
        //     $student->delete();

        //     return redirect()->route('students.index')
        //         ->with('success', 'Student deleted successfully');
        // }

        public function delete($id)
        {
            $student = Student::findOrFail($id);
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student deleted successfully');
        }
}
