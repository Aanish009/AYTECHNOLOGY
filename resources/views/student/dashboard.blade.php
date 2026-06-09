@extends('layouts.dashboard')
@section('title', 'Student Dashboard - Fire Academy')
@section('page_title', 'Student Dashboard')

@section('sidebar')
<a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-secondary/10 text-secondary font-medium text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
    <span>Dashboard</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm transition-colors">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
    <span>My Courses</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm transition-colors">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
    <span>Certificates</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm transition-colors">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
    <span>Fire AI</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm transition-colors">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
    <span>Profile</span>
</a>
@endsection

@section('content')
{{-- Stats --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="card">
        <p class="text-text-muted text-sm">Enrolled Courses</p>
        <p class="text-2xl font-bold text-white mt-1">{{ $stats['enrolled_courses'] }}</p>
    </div>
    <div class="card">
        <p class="text-text-muted text-sm">Completed</p>
        <p class="text-2xl font-bold text-white mt-1">{{ $stats['completed_courses'] }}</p>
    </div>
    <div class="card">
        <p class="text-text-muted text-sm">Certificates</p>
        <p class="text-2xl font-bold text-white mt-1">{{ $stats['certificates_earned'] }}</p>
    </div>
    <div class="card">
        <p class="text-text-muted text-sm">Fire Coins</p>
        <p class="text-2xl font-bold gradient-text mt-1">{{ $stats['fire_coins'] }}</p>
    </div>
</div>

{{-- Enrolled Courses --}}
<div class="card">
    <h3 class="text-lg font-semibold text-white mb-4">My Courses</h3>
    @forelse($enrollments as $enrollment)
    <div class="flex items-center justify-between py-3 border-b border-white/5 last:border-0">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-lg bg-secondary/20 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <p class="text-white text-sm font-medium">{{ $enrollment->course->title }}</p>
                <p class="text-text-muted text-xs">{{ $enrollment->course->category->name ?? '' }}</p>
            </div>
        </div>
        <div class="text-right">
            <div class="w-24 h-2 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full bg-secondary rounded-full" style="width: {{ $enrollment->progress_percent }}%"></div>
            </div>
            <p class="text-text-muted text-xs mt-1">{{ $enrollment->progress_percent }}%</p>
        </div>
    </div>
    @empty
    <p class="text-text-muted text-sm">No courses enrolled yet. <a href="{{ route('courses.index') }}" class="text-secondary hover:underline">Browse courses</a></p>
    @endforelse
</div>
@endsection
