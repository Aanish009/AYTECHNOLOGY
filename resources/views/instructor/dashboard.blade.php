@extends('layouts.dashboard')
@section('title', 'Instructor Dashboard - Fire Academy')
@section('page_title', 'Instructor Dashboard')

@section('sidebar')
<a href="{{ route('instructor.dashboard') }}" class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-secondary/10 text-secondary font-medium text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
    <span>Dashboard</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
    <span>My Courses</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
    <span>Create Course</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
    <span>Reports</span>
</a>
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="card"><p class="text-text-muted text-sm">Total Courses</p><p class="text-2xl font-bold text-white mt-1">{{ $stats['total_courses'] }}</p></div>
    <div class="card"><p class="text-text-muted text-sm">Published</p><p class="text-2xl font-bold text-white mt-1">{{ $stats['published_courses'] }}</p></div>
    <div class="card"><p class="text-text-muted text-sm">Students</p><p class="text-2xl font-bold text-white mt-1">{{ $stats['total_students'] }}</p></div>
    <div class="card"><p class="text-text-muted text-sm">Revenue</p><p class="text-2xl font-bold gradient-text mt-1">₹{{ number_format($stats['total_revenue']) }}</p></div>
</div>

<div class="card">
    <h3 class="text-lg font-semibold text-white mb-4">My Courses</h3>
    @forelse($courses as $course)
    <div class="flex items-center justify-between py-3 border-b border-white/5 last:border-0">
        <div>
            <p class="text-white text-sm font-medium">{{ $course->title }}</p>
            <p class="text-text-muted text-xs">{{ $course->total_enrollments }} students &bull; {{ ucfirst($course->status) }}</p>
        </div>
        <span class="px-2 py-1 text-xs rounded bg-{{ $course->approval_status === 'approved' ? 'green' : ($course->approval_status === 'pending' ? 'yellow' : 'red') }}-500/20 text-{{ $course->approval_status === 'approved' ? 'green' : ($course->approval_status === 'pending' ? 'yellow' : 'red') }}-400">{{ ucfirst($course->approval_status) }}</span>
    </div>
    @empty
    <p class="text-text-muted text-sm">No courses created yet.</p>
    @endforelse
</div>
@endsection
