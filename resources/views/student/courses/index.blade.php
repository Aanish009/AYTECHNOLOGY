@extends('layouts.student-app')
@section('title', 'My Courses - Fire Academy')
@section('page_title', 'My Courses')

@section('content')
{{-- Course Filter Tabs --}}
<div class="flex items-center space-x-2 mb-6 overflow-x-auto pb-2" x-data="{ tab: 'all' }">
    <button @click="tab = 'all'" :class="tab === 'all' ? 'bg-secondary text-white' : 'bg-white/5 text-text-muted hover:text-white'" class="px-4 py-2 rounded-full text-sm font-medium transition-colors whitespace-nowrap">All Courses</button>
    <button @click="tab = 'active'" :class="tab === 'active' ? 'bg-secondary text-white' : 'bg-white/5 text-text-muted hover:text-white'" class="px-4 py-2 rounded-full text-sm font-medium transition-colors whitespace-nowrap">In Progress</button>
    <button @click="tab = 'completed'" :class="tab === 'completed' ? 'bg-secondary text-white' : 'bg-white/5 text-text-muted hover:text-white'" class="px-4 py-2 rounded-full text-sm font-medium transition-colors whitespace-nowrap">Completed</button>
</div>

{{-- Enrolled Courses --}}
@forelse($enrollments as $enrollment)
<a href="{{ route('student.courses.show', $enrollment->course) }}" class="card block mb-4 hover:border-secondary/40 transition-all">
    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
        <div class="w-full sm:w-32 h-20 rounded-lg bg-gradient-to-br from-secondary/30 to-accent/20 flex items-center justify-center shrink-0">
            @if($enrollment->course->thumbnail)
            <img src="{{ asset('storage/' . $enrollment->course->thumbnail) }}" alt="" class="w-full h-full object-cover rounded-lg">
            @else
            <svg class="w-10 h-10 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
            @endif
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-start justify-between">
                <div class="min-w-0 flex-1">
                    <h3 class="text-white font-semibold text-sm truncate">{{ $enrollment->course->title }}</h3>
                    <p class="text-text-muted text-xs mt-0.5">{{ $enrollment->course->category->name ?? '' }} &bull; {{ $enrollment->course->instructor->name ?? '' }}</p>
                </div>
                <span class="px-2 py-0.5 rounded-full text-xs font-medium ml-2 shrink-0 {{ $enrollment->status === 'completed' ? 'bg-green-500/20 text-green-400' : 'bg-secondary/20 text-secondary' }}">
                    {{ ucfirst($enrollment->status) }}
                </span>
            </div>
            <div class="mt-3">
                <div class="flex items-center justify-between mb-1">
                    <span class="text-text-muted text-xs">Progress</span>
                    <span class="text-white text-xs font-medium">{{ $enrollment->progress_percent }}%</span>
                </div>
                <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-secondary to-accent rounded-full transition-all duration-500" style="width: {{ $enrollment->progress_percent }}%"></div>
                </div>
            </div>
            <div class="flex items-center space-x-4 mt-2 text-xs text-text-muted">
                <span>{{ $enrollment->course->total_lectures ?? 0 }} Lectures</span>
                <span>{{ $enrollment->course->duration ?? '0h' }}</span>
                <span>Enrolled {{ $enrollment->enrolled_at?->diffForHumans() ?? $enrollment->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</a>
@empty
<div class="card text-center py-12">
    <div class="w-20 h-20 mx-auto rounded-full bg-white/5 flex items-center justify-center mb-4">
        <svg class="w-10 h-10 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
    </div>
    <h3 class="text-white font-semibold text-lg mb-2">No courses enrolled yet</h3>
    <p class="text-text-muted text-sm mb-4">Start your fire safety learning journey today!</p>
    <a href="{{ route('courses.index') }}" class="btn-primary inline-block">Browse Courses</a>
</div>
@endforelse

{{-- Recommended Courses --}}
@if($recommended->count() > 0)
<div class="mt-8">
    <h3 class="text-lg font-semibold text-white mb-4">Recommended For You</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach($recommended as $course)
        <div class="card hover:border-secondary/40">
            <div class="w-full h-32 rounded-lg bg-gradient-to-br from-secondary/20 to-accent/10 flex items-center justify-center mb-3">
                <svg class="w-12 h-12 text-secondary/50" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
            </div>
            <h4 class="text-white font-medium text-sm truncate">{{ $course->title }}</h4>
            <p class="text-text-muted text-xs mt-1">{{ $course->category->name ?? '' }} &bull; {{ $course->instructor->name ?? '' }}</p>
            <div class="flex items-center justify-between mt-3">
                <span class="text-secondary font-bold text-sm">{{ $course->price > 0 ? '₹' . number_format($course->price) : 'Free' }}</span>
                <a href="{{ route('courses.show', $course->slug ?? $course->id) }}" class="text-xs text-secondary hover:underline">View Details →</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection
