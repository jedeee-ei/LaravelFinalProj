<?php

namespace App\Http\Controllers;
use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;

// ClassController.php
class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::with('students')->paginate(10);
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $students = Student::where('status', 'active')->get();
        return view('classes.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:classes',
            'capacity' => 'required|integer|min:1',
            'student_ids' => 'required|array',
            'student_ids.*' => 'exists:students,id'
        ]);
        
        if (count($validated['student_ids']) > $validated['capacity']) {
            return redirect()->back()
                ->withErrors(['student_ids' => 'The number of students exceeds the class capacity.'])
                ->withInput();
        }

        $class = ClassRoom::create([
            'name' => $validated['name'],
            'code' => $validated['code'],
            'capacity' => $validated['capacity']
        ]);

        $class->students()->attach($validated['student_ids']);

        return redirect()->route('classes.index')
            ->with('success', 'Class created successfully');
    }

    public function edit(ClassRoom $class)
    {
        $students = Student::where('status', 'active')->get();
        return view('classes.edit', compact('class', 'students'));
    }

    public function update(Request $request, ClassRoom $class)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'integer|min:1',
            'code' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'student_ids' => 'array',
            'student_ids.*' => 'exists:students,id'
        ]);

        // dd([
        //     'class_id' => $class->id,
        //     'student_ids' => $validated['student_ids'] ?? [],
        //     'class_exists' => $class->exists
        // ]);

        $class->update([
            'name' => $validated['name'],
            'code' => $validated ['code'],
            'capacity' => $validated['capacity'],
            'status' => $validated['status']
        ]);

        if (isset($validated['student_ids'])) {
            $class->students()->sync($validated['student_ids']);
        }

        return redirect()->route('classes.index')
            ->with('success', 'Class updated successfully');
    }
}
