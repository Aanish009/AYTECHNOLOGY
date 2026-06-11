@extends('layouts.student-app')
@section('title', 'Quizzes & Exams - Fire Academy')
@section('page_title', 'Quizzes & Exams')

@section('content')
{{-- Quick Stats --}}
<div class="grid grid-cols-3 gap-3 mb-6">
    <div class="card !p-3 text-center">
        <p class="text-xl font-bold text-white">{{ $quizzes->count() }}</p>
        <p class="text-text-muted text-xs">Available</p>
    </div>
    <div class="card !p-3 text-center">
        <p class="text-xl font-bold text-green-400">{{ $attempts->flatten()->where('passed', true)->count() }}</p>
        <p class="text-text-muted text-xs">Passed</p>
    </div>
    <div class="card !p-3 text-center">
        <p class="text-xl font-bold text-secondary">{{ $attempts->flatten()->count() }}</p>
        <p class="text-text-muted text-xs">Attempts</p>
    </div>
</div>

{{-- Quiz List --}}
@forelse($quizzes as $quiz)
<div class="card mb-4">
    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
        <div class="w-14 h-14 rounded-xl flex items-center justify-center shrink-0
            @if(isset($attempts[$quiz->id]) && $attempts[$quiz->id]->where('passed', true)->count() > 0)
                bg-green-500/20
            @else
                bg-secondary/20
            @endif
        ">
            @if(isset($attempts[$quiz->id]) && $attempts[$quiz->id]->where('passed', true)->count() > 0)
            <svg class="w-7 h-7 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            @else
            <svg class="w-7 h-7 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            @endif
        </div>
        <div class="flex-1 min-w-0">
            <h3 class="text-white font-semibold text-sm">{{ $quiz->title }}</h3>
            <p class="text-text-muted text-xs mt-0.5">{{ $quiz->course->title ?? '' }}</p>
            <div class="flex flex-wrap items-center gap-3 mt-2">
                <span class="flex items-center space-x-1 text-text-muted text-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ $quiz->questions->count() }} Questions</span>
                </span>
                @if($quiz->duration_minutes)
                <span class="flex items-center space-x-1 text-text-muted text-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ $quiz->duration_minutes }} min</span>
                </span>
                @endif
                <span class="flex items-center space-x-1 text-text-muted text-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    <span>Pass: {{ $quiz->pass_percentage ?? 60 }}%</span>
                </span>
                @if(isset($attempts[$quiz->id]))
                <span class="text-xs text-secondary font-medium">{{ $attempts[$quiz->id]->count() }} attempt(s)</span>
                @endif
            </div>
        </div>
        <a href="{{ route('student.quizzes.show', $quiz) }}" class="btn-primary !py-2 !px-4 text-sm shrink-0">
            @if(isset($attempts[$quiz->id]) && $attempts[$quiz->id]->count() > 0)
                View Results
            @else
                Start Quiz
            @endif
        </a>
    </div>

    {{-- Recent attempts for this quiz --}}
    @if(isset($attempts[$quiz->id]) && $attempts[$quiz->id]->count() > 0)
    <div class="mt-3 pt-3 border-t border-white/5">
        <div class="flex items-center space-x-3 overflow-x-auto pb-1">
            @foreach($attempts[$quiz->id]->take(3) as $attempt)
            <span class="inline-flex items-center space-x-1 px-2 py-1 rounded-full text-xs {{ $attempt->passed ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }} whitespace-nowrap">
                <span>{{ $attempt->percentage ?? 0 }}%</span>
                <span class="text-text-muted">&bull; {{ $attempt->created_at->format('M d') }}</span>
            </span>
            @endforeach
        </div>
    </div>
    @endif
</div>
@empty
<div class="card text-center py-12">
    <div class="w-20 h-20 mx-auto rounded-full bg-white/5 flex items-center justify-center mb-4">
        <svg class="w-10 h-10 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
    </div>
    <h3 class="text-white font-semibold text-lg mb-2">No quizzes available</h3>
    <p class="text-text-muted text-sm">Quizzes will appear here when your enrolled courses have assessments.</p>
</div>
@endforelse
@endsection
