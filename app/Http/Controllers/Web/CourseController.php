<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::where('status', 'published')
            ->where('approval_status', 'approved')
            ->with('category', 'instructor');

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                  ->orWhere('description', 'like', "%{$request->search}%");
            });
        }

        $courses = $query->latest()->paginate(12);
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('web.courses.index', compact('courses', 'categories'));
    }

    public function show(string $slug)
    {
        $course = Course::where('slug', $slug)
            ->where('status', 'published')
            ->with(['category', 'instructor.instructorProfile', 'modules.lessons', 'reviews' => fn($q) => $q->where('is_approved', true)->latest()->limit(5)])
            ->firstOrFail();

        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', 'published')
            ->limit(3)
            ->get();

        return view('web.courses.show', compact('course', 'relatedCourses'));
    }
}
