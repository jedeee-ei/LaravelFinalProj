<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function index()
    {
        $stats = [
            'total_students' => Student::count(),
            'present_today' => Student::where('attendance_date', now()->format('Y-m-d'))
                                    ->where('is_present', true)
                                    ->count(),
            'total_classes' => ClassRoom::count()
        ];

        return view('dashboard.index', compact('stats'));
    }

    public function getStats()
    {
        $stats = [
            'total_students' => Student::count(),
            'present_today' => Student::where('attendance_date', now()->format('Y-m-d'))
                                    ->where('is_present', true)
                                    ->count(),
            'total_classes' => ClassRoom::count()
        ];

        return response()->json($stats);
    }
}
