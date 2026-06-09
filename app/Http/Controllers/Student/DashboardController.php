<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $enrollments = Enrollment::where('user_id', $user->id)
            ->with('course.category')
            ->latest()
            ->get();

        $certificates = Certificate::where('user_id', $user->id)
            ->with('course')
            ->latest()
            ->get();

        $stats = [
            'enrolled_courses' => $enrollments->count(),
            'completed_courses' => $enrollments->where('status', 'completed')->count(),
            'certificates_earned' => $certificates->count(),
            'fire_coins' => $user->fire_coins,
        ];

        return view('student.dashboard', compact('stats', 'enrollments', 'certificates'));
    }
}
