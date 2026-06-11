@extends('layouts.student-app')
@section('title', 'My Progress - Fire Academy')
@section('page_title', 'My Progress')

@section('content')
{{-- Overall Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-6 mb-6">
    <div class="card !p-4 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-secondary/20 flex items-center justify-center mb-2">
            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
        <p class="text-2xl font-bold text-white">{{ $progressStats['total_courses'] }}</p>
        <p class="text-text-muted text-xs">Total Courses</p>
    </div>
    <div class="card !p-4 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-green-500/20 flex items-center justify-center mb-2">
            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="text-2xl font-bold text-white">{{ $progressStats['completed_courses'] }}</p>
        <p class="text-text-muted text-xs">Completed</p>
    </div>
    <div class="card !p-4 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-blue-500/20 flex items-center justify-center mb-2">
            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
        </div>
        <p class="text-2xl font-bold text-white">{{ $progressStats['lessons_completed'] }}</p>
        <p class="text-text-muted text-xs">Lessons Done</p>
    </div>
    <div class="card !p-4 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-purple-500/20 flex items-center justify-center mb-2">
            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="text-2xl font-bold text-white">{{ $progressStats['study_hours'] }}h</p>
        <p class="text-text-muted text-xs">Study Time</p>
    </div>
    <div class="card !p-4 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-accent/20 flex items-center justify-center mb-2">
            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
        </div>
        <p class="text-2xl font-bold text-white">{{ $progressStats['quizzes_taken'] }}</p>
        <p class="text-text-muted text-xs">Quizzes Taken</p>
    </div>
    <div class="card !p-4 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-red-500/20 flex items-center justify-center mb-2">
            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
        </div>
        <p class="text-2xl font-bold text-white">{{ $progressStats['avg_quiz_score'] }}%</p>
        <p class="text-text-muted text-xs">Avg Score</p>
    </div>
</div>

{{-- Course Progress Details --}}
<div class="card">
    <h3 class="text-lg font-semibold text-white mb-4">Course Progress</h3>
    @forelse($enrollments as $enrollment)
    <div class="py-4 border-b border-white/5 last:border-0">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center space-x-3 min-w-0 flex-1">
                <div class="w-10 h-10 rounded-lg bg-secondary/20 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-white text-sm font-medium truncate">{{ $enrollment->course->title }}</p>
                    <p class="text-text-muted text-xs">{{ $enrollment->course->category->name ?? '' }} &bull; {{ $enrollment->course->instructor->name ?? '' }}</p>
                </div>
            </div>
            <span class="text-white text-sm font-bold ml-3">{{ $enrollment->progress_percent }}%</span>
        </div>
        <div class="ml-13">
            <div class="w-full h-3 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full rounded-full transition-all duration-700 {{ $enrollment->status === 'completed' ? 'bg-green-500' : 'bg-gradient-to-r from-secondary to-accent' }}" style="width: {{ $enrollment->progress_percent }}%"></div>
            </div>
            <div class="flex items-center justify-between mt-1.5">
                <span class="text-text-muted text-xs">
                    @php
                        $totalLessons = $enrollment->course->modules->flatMap->lessons->count();
                        $completedCount = round(($enrollment->progress_percent / 100) * $totalLessons);
                    @endphp
                    {{ $completedCount }}/{{ $totalLessons }} lessons completed
                </span>
                <span class="text-xs {{ $enrollment->status === 'completed' ? 'text-green-400' : 'text-secondary' }}">{{ ucfirst($enrollment->status) }}</span>
            </div>
        </div>
    </div>
    @empty
    <p class="text-text-muted text-sm text-center py-8">No courses enrolled yet. Start learning today!</p>
    @endforelse
</div>
@endsection
