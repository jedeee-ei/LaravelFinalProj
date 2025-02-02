<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index()
    {
        // Get total counts
        $totalStudents = Student::count();
        $totalClasses = ClassRoom::count();

        // Get today's attendance summary
        $today = Carbon::now()->format('Y-m-d');
        $todayAttendance = Attendance::where('date', $today)->get();

        $presentToday = $todayAttendance->where('status', 'present')->count();
        $absentToday = $todayAttendance->where('status', 'absent')->count();
        $lateToday = $todayAttendance->where('status', 'late')->count();

        // Get weekly attendance stats
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $weeklyAttendance = Attendance::whereBetween('date', [$startOfWeek, $endOfWeek])
            ->get()
            ->groupBy('date')
            ->map(function ($dailyAttendance) {
                return [
                    'present' => $dailyAttendance->where('status', 'present')->count(),
                    'absent' => $dailyAttendance->where('status', 'absent')->count(),
                    'late' => $dailyAttendance->where('status', 'late')->count(),
                ];
            });

        // Get class-wise student distribution
        $classDistribution = ClassRoom::withCount('students')->get();

        return view('summary.index', compact(
            'totalStudents',
            'totalClasses',
            'presentToday',
            'absentToday',
            'lateToday',
            'weeklyAttendance',
            'classDistribution'
        ));
    }
}
