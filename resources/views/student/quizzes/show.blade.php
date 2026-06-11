@extends('layouts.student-app')
@section('title', $quiz->title . ' - Fire Academy')
@section('page_title', 'Quiz Details')

@section('content')
{{-- Quiz Info Card --}}
<div class="card mb-6">
    <div class="flex items-start space-x-4">
        <div class="w-14 h-14 rounded-xl bg-secondary/20 flex items-center justify-center shrink-0">
            <svg class="w-7 h-7 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
        </div>
        <div class="flex-1">
            <h2 class="text-xl font-bold text-white">{{ $quiz->title }}</h2>
            <p class="text-text-muted text-sm mt-1">{{ $quiz->course->title ?? '' }}</p>
            @if($quiz->description)
            <p class="text-text-muted text-sm mt-2">{{ $quiz->description }}</p>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-4 pt-4 border-t border-white/5">
        <div class="text-center">
            <p class="text-white font-bold text-lg">{{ $quiz->questions->count() }}</p>
            <p class="text-text-muted text-xs">Questions</p>
        </div>
        <div class="text-center">
            <p class="text-white font-bold text-lg">{{ $quiz->duration_minutes ?? '∞' }}</p>
            <p class="text-text-muted text-xs">Minutes</p>
        </div>
        <div class="text-center">
            <p class="text-white font-bold text-lg">{{ $quiz->pass_percentage ?? 60 }}%</p>
            <p class="text-text-muted text-xs">Pass Score</p>
        </div>
        <div class="text-center">
            <p class="text-white font-bold text-lg">{{ $quiz->max_attempts ?? '∞' }}</p>
            <p class="text-text-muted text-xs">Max Attempts</p>
        </div>
    </div>

    @if($canAttempt)
    <div class="mt-4 pt-4 border-t border-white/5 text-center">
        <button class="btn-primary" onclick="alert('Quiz interface coming in next phase!')">
            <span class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/></svg>
                <span>Start Quiz</span>
            </span>
        </button>
    </div>
    @else
    <div class="mt-4 pt-4 border-t border-white/5 text-center">
        <p class="text-red-400 text-sm">Maximum attempts reached</p>
    </div>
    @endif
</div>

{{-- Previous Attempts --}}
@if($attempts->count() > 0)
<div class="card">
    <h3 class="text-lg font-semibold text-white mb-4">Your Attempts</h3>
    @foreach($attempts as $attempt)
    <div class="flex items-center justify-between py-3 border-b border-white/5 last:border-0">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-lg {{ $attempt->passed ? 'bg-green-500/20' : 'bg-red-500/20' }} flex items-center justify-center">
                @if($attempt->passed)
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg>
                @else
                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                @endif
            </div>
            <div>
                <p class="text-white text-sm font-medium">Attempt #{{ $loop->remaining + 1 }}</p>
                <p class="text-text-muted text-xs">{{ $attempt->created_at->format('M d, Y h:i A') }}</p>
            </div>
        </div>
        <div class="text-right">
            <p class="text-lg font-bold {{ $attempt->passed ? 'text-green-400' : 'text-red-400' }}">{{ $attempt->percentage ?? 0 }}%</p>
            <p class="text-xs {{ $attempt->passed ? 'text-green-400' : 'text-red-400' }}">{{ $attempt->passed ? 'Passed' : 'Failed' }}</p>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection
