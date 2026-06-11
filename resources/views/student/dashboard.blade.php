@extends('layouts.student-app')
@section('title', 'Student Dashboard - Fire Academy')
@section('page_title', 'Dashboard')

@section('content')
{{-- Welcome Section --}}
<div class="mb-6">
    <h2 class="text-xl font-bold text-white">Welcome back, {{ auth()->user()->name }}! 🔥</h2>
    <p class="text-text-muted text-sm mt-1">Track your learning progress and continue where you left off.</p>
</div>

{{-- Stats Grid --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-6 mb-6">
    <div class="card !p-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-lg bg-secondary/20 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">{{ $stats['enrolled_courses'] }}</p>
                <p class="text-text-muted text-xs">Enrolled</p>
            </div>
        </div>
    </div>
    <div class="card !p-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-lg bg-green-500/20 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">{{ $stats['completed_courses'] }}</p>
                <p class="text-text-muted text-xs">Completed</p>
            </div>
        </div>
    </div>
    <div class="card !p-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-lg bg-accent/20 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">{{ $stats['certificates_earned'] }}</p>
                <p class="text-text-muted text-xs">Certificates</p>
            </div>
        </div>
    </div>
    <div class="card !p-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
            </div>
            <div>
                <p class="text-2xl font-bold gradient-text">{{ $stats['fire_coins'] }}</p>
                <p class="text-text-muted text-xs">Fire Coins</p>
            </div>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
    <a href="{{ route('student.courses') }}" class="card !p-4 text-center hover:border-secondary/50 group">
        <div class="w-12 h-12 mx-auto rounded-xl bg-secondary/10 flex items-center justify-center group-hover:bg-secondary/20 transition-colors">
            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="text-white text-xs font-medium mt-2">Continue Learning</p>
    </a>
    <a href="{{ route('student.quizzes') }}" class="card !p-4 text-center hover:border-secondary/50 group">
        <div class="w-12 h-12 mx-auto rounded-xl bg-blue-500/10 flex items-center justify-center group-hover:bg-blue-500/20 transition-colors">
            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        </div>
        <p class="text-white text-xs font-medium mt-2">Take Quiz</p>
    </a>
    <a href="{{ route('student.mentors') }}" class="card !p-4 text-center hover:border-secondary/50 group">
        <div class="w-12 h-12 mx-auto rounded-xl bg-green-500/10 flex items-center justify-center group-hover:bg-green-500/20 transition-colors">
            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <p class="text-white text-xs font-medium mt-2">My Mentors</p>
    </a>
    <a href="{{ route('student.support') }}" class="card !p-4 text-center hover:border-secondary/50 group">
        <div class="w-12 h-12 mx-auto rounded-xl bg-red-500/10 flex items-center justify-center group-hover:bg-red-500/20 transition-colors">
            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </div>
        <p class="text-white text-xs font-medium mt-2">Get Help</p>
    </a>
</div>

{{-- In-Progress Courses --}}
<div class="card mb-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-white">Continue Learning</h3>
        <a href="{{ route('student.courses') }}" class="text-secondary text-sm hover:underline">View All</a>
    </div>
    @forelse($enrollments->where('status', 'active')->take(3) as $enrollment)
    <a href="{{ route('student.courses.show', $enrollment->course) }}" class="flex items-center justify-between py-3 border-b border-white/5 last:border-0 hover:bg-white/5 -mx-6 px-6 transition-colors">
        <div class="flex items-center space-x-3 flex-1 min-w-0">
            <div class="w-12 h-12 rounded-lg bg-secondary/20 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-white text-sm font-medium truncate">{{ $enrollment->course->title }}</p>
                <p class="text-text-muted text-xs">{{ $enrollment->course->category->name ?? 'General' }} &bull; {{ $enrollment->course->instructor->name ?? '' }}</p>
            </div>
        </div>
        <div class="text-right ml-4 shrink-0">
            <div class="w-20 h-2 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-secondary to-accent rounded-full transition-all" style="width: {{ $enrollment->progress_percent }}%"></div>
            </div>
            <p class="text-text-muted text-xs mt-1">{{ $enrollment->progress_percent }}%</p>
        </div>
    </a>
    @empty
    <div class="text-center py-8">
        <div class="w-16 h-16 mx-auto rounded-full bg-white/5 flex items-center justify-center mb-3">
            <svg class="w-8 h-8 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
        <p class="text-text-muted text-sm">No courses in progress</p>
        <a href="{{ route('courses.index') }}" class="btn-primary inline-block mt-3 !py-2 !px-4 text-sm">Browse Courses</a>
    </div>
    @endforelse
</div>

{{-- Recent Quiz Activity --}}
<div class="card">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-white">Recent Quiz Activity</h3>
        <a href="{{ route('student.quizzes') }}" class="text-secondary text-sm hover:underline">View All</a>
    </div>
    @forelse($recentQuizAttempts as $attempt)
    <div class="flex items-center justify-between py-3 border-b border-white/5 last:border-0">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-lg {{ $attempt->passed ? 'bg-green-500/20' : 'bg-red-500/20' }} flex items-center justify-center shrink-0">
                @if($attempt->passed)
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                @else
                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                @endif
            </div>
            <div>
                <p class="text-white text-sm font-medium">{{ $attempt->quiz->title ?? 'Quiz' }}</p>
                <p class="text-text-muted text-xs">{{ $attempt->quiz->course->title ?? '' }} &bull; {{ $attempt->created_at->diffForHumans() }}</p>
            </div>
        </div>
        <span class="text-sm font-bold {{ $attempt->passed ? 'text-green-400' : 'text-red-400' }}">{{ $attempt->percentage ?? 0 }}%</span>
    </div>
    @empty
    <p class="text-text-muted text-sm text-center py-4">No quiz attempts yet</p>
    @endforelse
</div>
@endsection
