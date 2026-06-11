@extends('layouts.student-app')
@section('title', $course->title . ' - Fire Academy')
@section('page_title', 'Course Details')

@section('content')
{{-- Course Header --}}
<div class="card mb-6">
    <div class="flex flex-col lg:flex-row lg:items-center gap-4">
        <div class="w-full lg:w-48 h-28 rounded-lg bg-gradient-to-br from-secondary/30 to-accent/20 flex items-center justify-center shrink-0">
            @if($course->thumbnail)
            <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="" class="w-full h-full object-cover rounded-lg">
            @else
            <svg class="w-12 h-12 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
            @endif
        </div>
        <div class="flex-1">
            <h2 class="text-xl font-bold text-white">{{ $course->title }}</h2>
            <p class="text-text-muted text-sm mt-1">{{ $course->short_description }}</p>
            <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-text-muted">
                <span class="flex items-center space-x-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg><span>{{ $course->instructor->name ?? 'Instructor' }}</span></span>
                <span class="flex items-center space-x-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span>{{ $course->duration ?? 'Self-paced' }}</span></span>
                <span class="flex items-center space-x-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg><span>{{ $course->total_lectures ?? 0 }} Lectures</span></span>
                <span class="px-2 py-0.5 rounded-full bg-secondary/10 text-secondary">{{ ucfirst($course->level ?? 'all') }}</span>
            </div>
        </div>
        @if($enrollment)
        <div class="shrink-0 text-center">
            <div class="relative w-16 h-16 mx-auto">
                <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 36 36">
                    <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="3"/>
                    <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#FF6B00" stroke-width="3" stroke-dasharray="{{ $enrollment->progress_percent }}, 100"/>
                </svg>
                <span class="absolute inset-0 flex items-center justify-center text-white text-sm font-bold">{{ $enrollment->progress_percent }}%</span>
            </div>
            <p class="text-text-muted text-xs mt-1">Progress</p>
        </div>
        @endif
    </div>
</div>

{{-- Course Curriculum --}}
<div class="card">
    <h3 class="text-lg font-semibold text-white mb-4">Course Curriculum</h3>
    @forelse($course->modules as $module)
    <div class="mb-4 last:mb-0" x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }">
        <button @click="open = !open" class="w-full flex items-center justify-between p-3 rounded-lg bg-white/5 hover:bg-white/10 transition-colors">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-secondary/20 flex items-center justify-center shrink-0">
                    <span class="text-secondary text-sm font-bold">{{ $loop->iteration }}</span>
                </div>
                <div class="text-left">
                    <p class="text-white text-sm font-medium">{{ $module->title }}</p>
                    <p class="text-text-muted text-xs">{{ $module->lessons->count() }} lessons</p>
                </div>
            </div>
            <svg class="w-5 h-5 text-text-muted transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div x-show="open" x-transition class="mt-2 ml-4 space-y-1">
            @foreach($module->lessons as $lesson)
            <a href="{{ route('student.lecture', [$course, $lesson]) }}" class="flex items-center justify-between p-2.5 rounded-lg hover:bg-white/5 transition-colors group">
                <div class="flex items-center space-x-3">
                    @if(isset($lessonProgress[$lesson->id]) && $lessonProgress[$lesson->id])
                    <div class="w-6 h-6 rounded-full bg-green-500/20 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    @else
                    <div class="w-6 h-6 rounded-full bg-white/10 flex items-center justify-center shrink-0 group-hover:bg-secondary/20">
                        <svg class="w-3.5 h-3.5 text-text-muted group-hover:text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
                    </div>
                    @endif
                    <div>
                        <p class="text-white text-sm {{ isset($lessonProgress[$lesson->id]) && $lessonProgress[$lesson->id] ? 'line-through text-text-muted' : '' }}">{{ $lesson->title }}</p>
                        <p class="text-text-muted text-xs">{{ ucfirst($lesson->type ?? 'video') }} &bull; {{ $lesson->duration_minutes ?? 0 }} min</p>
                    </div>
                </div>
                @if($lesson->is_free_preview)
                <span class="text-xs text-accent font-medium">Free</span>
                @endif
            </a>
            @endforeach
        </div>
    </div>
    @empty
    <p class="text-text-muted text-sm text-center py-4">No modules available yet</p>
    @endforelse
</div>
@endsection
