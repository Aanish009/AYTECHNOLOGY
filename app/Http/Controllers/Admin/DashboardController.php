<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_students' => User::whereHas('role', fn($q) => $q->where('slug', 'student'))->count(),
            'total_instructors' => User::whereHas('role', fn($q) => $q->where('slug', 'instructor'))->count(),
            'total_courses' => Course::count(),
            'total_enrollments' => Enrollment::count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total'),
            'pending_courses' => Course::where('approval_status', 'pending')->count(),
        ];

        $recentEnrollments = Enrollment::with('user', 'course')->latest()->limit(10)->get();
        $recentOrders = Order::with('user', 'course')->latest()->limit(10)->get();

        return view('admin.dashboard', compact('stats', 'recentEnrollments', 'recentOrders'));
    }
}
