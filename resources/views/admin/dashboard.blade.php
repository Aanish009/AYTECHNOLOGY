@extends('layouts.dashboard')
@section('title', 'Admin Dashboard - Fire Academy')
@section('page_title', 'Admin Dashboard')

@section('sidebar')
<a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-secondary/10 text-secondary font-medium text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
    <span>Dashboard</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
    <span>Users</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
    <span>Courses</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
    <span>Payments</span>
</a>
<a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-text-muted hover:text-white hover:bg-white/5 text-sm">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
    <span>Settings</span>
</a>
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <div class="card"><p class="text-text-muted text-sm">Total Students</p><p class="text-2xl font-bold text-white mt-1">{{ number_format($stats['total_students']) }}</p></div>
    <div class="card"><p class="text-text-muted text-sm">Total Instructors</p><p class="text-2xl font-bold text-white mt-1">{{ $stats['total_instructors'] }}</p></div>
    <div class="card"><p class="text-text-muted text-sm">Total Courses</p><p class="text-2xl font-bold text-white mt-1">{{ $stats['total_courses'] }}</p></div>
    <div class="card"><p class="text-text-muted text-sm">Total Enrollments</p><p class="text-2xl font-bold text-white mt-1">{{ number_format($stats['total_enrollments']) }}</p></div>
    <div class="card"><p class="text-text-muted text-sm">Revenue</p><p class="text-2xl font-bold gradient-text mt-1">₹{{ number_format($stats['total_revenue']) }}</p></div>
    <div class="card"><p class="text-text-muted text-sm">Pending Approval</p><p class="text-2xl font-bold text-accent mt-1">{{ $stats['pending_courses'] }}</p></div>
</div>

<div class="grid lg:grid-cols-2 gap-6">
    <div class="card">
        <h3 class="text-lg font-semibold text-white mb-4">Recent Enrollments</h3>
        @forelse($recentEnrollments as $enrollment)
        <div class="flex items-center justify-between py-2 border-b border-white/5 last:border-0">
            <div><p class="text-white text-sm">{{ $enrollment->user->name ?? 'N/A' }}</p><p class="text-text-muted text-xs">{{ $enrollment->course->title ?? '' }}</p></div>
            <span class="text-text-muted text-xs">{{ $enrollment->created_at->diffForHumans() }}</span>
        </div>
        @empty
        <p class="text-text-muted text-sm">No recent enrollments.</p>
        @endforelse
    </div>
    <div class="card">
        <h3 class="text-lg font-semibold text-white mb-4">Recent Orders</h3>
        @forelse($recentOrders as $order)
        <div class="flex items-center justify-between py-2 border-b border-white/5 last:border-0">
            <div><p class="text-white text-sm">{{ $order->user->name ?? 'N/A' }}</p><p class="text-text-muted text-xs">{{ $order->order_number }}</p></div>
            <span class="text-secondary font-medium text-sm">₹{{ number_format($order->total) }}</span>
        </div>
        @empty
        <p class="text-text-muted text-sm">No recent orders.</p>
        @endforelse
    </div>
</div>
@endsection
