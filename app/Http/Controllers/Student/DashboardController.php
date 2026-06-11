<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\LessonProgress;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $enrollments = Enrollment::where('user_id', $user->id)
            ->with('course.category', 'course.instructor')
            ->latest()
            ->get();

        $certificates = Certificate::where('user_id', $user->id)
            ->with('course')
            ->latest()
            ->get();

        $recentQuizAttempts = QuizAttempt::where('user_id', $user->id)
            ->with('quiz.course')
            ->latest()
            ->take(5)
            ->get();

        $stats = [
            'enrolled_courses' => $enrollments->count(),
            'completed_courses' => $enrollments->where('status', 'completed')->count(),
            'certificates_earned' => $certificates->count(),
            'fire_coins' => $user->fire_coins ?? 0,
            'in_progress' => $enrollments->where('status', 'active')->count(),
            'avg_progress' => $enrollments->count() > 0 ? round($enrollments->avg('progress_percent'), 1) : 0,
        ];

        return view('student.dashboard', compact('stats', 'enrollments', 'certificates', 'recentQuizAttempts'));
    }

    public function courses()
    {
        $user = auth()->user();

        $enrollments = Enrollment::where('user_id', $user->id)
            ->with('course.category', 'course.instructor', 'course.modules.lessons')
            ->latest()
            ->get();

        $recommended = Course::where('status', 'published')
            ->whereNotIn('id', $enrollments->pluck('course_id'))
            ->with('category', 'instructor')
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('student.courses.index', compact('enrollments', 'recommended'));
    }

    public function courseDetail(Course $course)
    {
        $user = auth()->user();

        $enrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        $course->load('modules.lessons', 'instructor', 'category', 'reviews');

        $lessonProgress = LessonProgress::where('user_id', $user->id)
            ->whereIn('lesson_id', $course->lessons()->pluck('id'))
            ->pluck('is_completed', 'lesson_id');

        return view('student.courses.show', compact('course', 'enrollment', 'lessonProgress'));
    }

    public function lecture(Course $course, Lesson $lesson)
    {
        $user = auth()->user();

        $enrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->firstOrFail();

        $course->load('modules.lessons');

        $progress = LessonProgress::firstOrCreate(
            ['user_id' => $user->id, 'lesson_id' => $lesson->id],
            ['is_completed' => false, 'watch_time_seconds' => 0, 'course_id' => $course->id]
        );

        $lessonProgress = LessonProgress::where('user_id', $user->id)
            ->whereIn('lesson_id', $course->lessons()->pluck('id'))
            ->pluck('is_completed', 'lesson_id');

        $nextLesson = Lesson::where('course_id', $course->id)
            ->where('position', '>', $lesson->position)
            ->orderBy('position')
            ->first();

        $prevLesson = Lesson::where('course_id', $course->id)
            ->where('position', '<', $lesson->position)
            ->orderBy('position', 'desc')
            ->first();

        return view('student.lectures.show', compact('course', 'lesson', 'enrollment', 'progress', 'lessonProgress', 'nextLesson', 'prevLesson'));
    }

    public function markLessonComplete(Course $course, Lesson $lesson)
    {
        $user = auth()->user();

        LessonProgress::updateOrCreate(
            ['user_id' => $user->id, 'lesson_id' => $lesson->id],
            ['is_completed' => true, 'completed_at' => now(), 'course_id' => $course->id]
        );

        $totalLessons = $course->lessons()->count();
        $completedLessons = LessonProgress::where('user_id', $user->id)
            ->whereIn('lesson_id', $course->lessons()->pluck('id'))
            ->where('is_completed', true)
            ->count();

        $progressPercent = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;

        Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->update([
                'progress_percent' => $progressPercent,
                'status' => $progressPercent >= 100 ? 'completed' : 'active',
                'completed_at' => $progressPercent >= 100 ? now() : null,
            ]);

        return back()->with('success', 'Lesson marked as complete!');
    }

    public function progress()
    {
        $user = auth()->user();

        $enrollments = Enrollment::where('user_id', $user->id)
            ->with('course.category', 'course.modules.lessons', 'course.instructor')
            ->get();

        $totalLessonsCompleted = LessonProgress::where('user_id', $user->id)
            ->where('is_completed', true)
            ->count();

        $totalStudyTime = LessonProgress::where('user_id', $user->id)
            ->sum('watch_time_seconds');

        $quizAttempts = QuizAttempt::where('user_id', $user->id)->get();

        $progressStats = [
            'total_courses' => $enrollments->count(),
            'completed_courses' => $enrollments->where('status', 'completed')->count(),
            'lessons_completed' => $totalLessonsCompleted,
            'study_hours' => round($totalStudyTime / 3600, 1),
            'quizzes_taken' => $quizAttempts->count(),
            'avg_quiz_score' => $quizAttempts->count() > 0 ? round($quizAttempts->avg('percentage'), 1) : 0,
        ];

        return view('student.progress', compact('enrollments', 'progressStats'));
    }

    public function quizzes()
    {
        $user = auth()->user();

        $enrolledCourseIds = Enrollment::where('user_id', $user->id)->pluck('course_id');

        $quizzes = Quiz::whereIn('course_id', $enrolledCourseIds)
            ->where('is_active', true)
            ->with('course', 'questions')
            ->get();

        $attempts = QuizAttempt::where('user_id', $user->id)
            ->with('quiz.course')
            ->latest()
            ->get()
            ->groupBy('quiz_id');

        return view('student.quizzes.index', compact('quizzes', 'attempts'));
    }

    public function quizDetail(Quiz $quiz)
    {
        $user = auth()->user();

        $enrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $quiz->course_id)
            ->firstOrFail();

        $quiz->load('course', 'questions');

        $attempts = QuizAttempt::where('user_id', $user->id)
            ->where('quiz_id', $quiz->id)
            ->latest()
            ->get();

        $canAttempt = $quiz->max_attempts === null || $attempts->count() < $quiz->max_attempts;

        return view('student.quizzes.show', compact('quiz', 'attempts', 'canAttempt', 'enrollment'));
    }

    public function materials()
    {
        $user = auth()->user();

        $enrolledCourseIds = Enrollment::where('user_id', $user->id)->pluck('course_id');

        $courses = Course::whereIn('id', $enrolledCourseIds)
            ->with('modules.lessons')
            ->get();

        $lessons = Lesson::whereIn('course_id', $enrolledCourseIds)
            ->where(function ($q) {
                $q->whereNotNull('pdf_file')
                    ->orWhere('type', 'pdf')
                    ->orWhere('type', 'document');
            })
            ->with('course')
            ->get();

        return view('student.materials', compact('courses', 'lessons'));
    }

    public function refer()
    {
        $user = auth()->user();

        $referralCode = $user->referral_code ?? strtoupper(substr($user->name, 0, 4) . $user->id . rand(100, 999));

        if (!$user->referral_code) {
            $user->update(['referral_code' => $referralCode]);
        }

        $referredUsers = User::where('referred_by', $user->id)->get();

        return view('student.refer', compact('referralCode', 'referredUsers'));
    }

    public function support()
    {
        return view('student.support');
    }

    public function mentors()
    {
        $mentors = User::whereHas('role', function ($q) {
            $q->where('slug', 'instructor');
        })
            ->with('instructorProfile')
            ->where('is_active', true)
            ->get();

        return view('student.mentors', compact('mentors'));
    }

    public function profile()
    {
        $user = auth()->user();
        $user->load('enrollments.course', 'certificates', 'studentProfile');

        return view('student.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function certificates()
    {
        $user = auth()->user();

        $certificates = Certificate::where('user_id', $user->id)
            ->with('course.instructor')
            ->latest()
            ->get();

        return view('student.certificates', compact('certificates'));
    }
}
