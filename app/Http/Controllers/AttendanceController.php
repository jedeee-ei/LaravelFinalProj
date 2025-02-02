<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\ClassRoom;
use App\Models\Student;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;

// AttendanceController.php
class AttendanceController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::where('status', 'active')->get();
        return view('attendance.index', compact('classes'));
        // return view('attendance.index');
    }

    public function show(ClassRoom $class)
    {
        $date = request('date', now()->toDateString());
        $students = $class->students()->with(['attendances' => function ($query) use ($date) {
            $query->whereDate('date', $date);
        }])->get();

        return view('attendance.show', compact('class', 'students', 'date'));
    }

    public function store(Request $request, ClassRoom $class)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'attendances' => 'required|array',
            'attendances.*' => 'in:present,absent,late'
        ]);

        foreach ($validated['attendances'] as $studentId => $status) {
            Attendance::updateOrCreate(
                [
                    'class_room_id' => $class->id,
                    'student_id' => $studentId,
                    'date' => $validated['date']
                ],
                ['status' => $status]
            );
        }

        return back()->with('success', 'Attendance marked successfully');
    }

}

