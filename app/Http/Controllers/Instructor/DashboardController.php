<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $courses = Course::where('instructor_id', $user->id)->get();
        $courseIds = $courses->pluck('id');

        $stats = [
            'total_courses' => $courses->count(),
            'published_courses' => $courses->where('status', 'published')->count(),
            'total_students' => Enrollment::whereIn('course_id', $courseIds)->distinct('user_id')->count('user_id'),
            'total_revenue' => \App\Models\Order::whereIn('course_id', $courseIds)->where('status', 'completed')->sum('total'),
        ];

        return view('instructor.dashboard', compact('stats', 'courses'));
    }
}
