@extends('layouts.student-app')
@section('title', 'My Profile - Fire Academy')
@section('page_title', 'My Profile')

@section('content')
{{-- Profile Header --}}
<div class="card mb-6">
    <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="w-20 h-20 rounded-full bg-gradient-to-br from-secondary to-accent flex items-center justify-center shrink-0">
            @if($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full rounded-full object-cover">
            @else
            <span class="text-white text-3xl font-bold">{{ substr($user->name, 0, 1) }}</span>
            @endif
        </div>
        <div class="text-center sm:text-left flex-1">
            <h2 class="text-xl font-bold text-white">{{ $user->name }}</h2>
            <p class="text-text-muted text-sm">{{ $user->email }}</p>
            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3 mt-2 text-xs text-text-muted">
                <span class="flex items-center space-x-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Joined {{ $user->created_at->format('M Y') }}</span>
                </span>
                <span class="px-2 py-0.5 rounded-full bg-secondary/20 text-secondary">Student</span>
                @if($user->plan)
                <span class="px-2 py-0.5 rounded-full bg-accent/20 text-accent">{{ ucfirst($user->plan) }} Plan</span>
                @endif
            </div>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold gradient-text">{{ $user->fire_coins ?? 0 }}</p>
            <p class="text-text-muted text-xs">Fire Coins</p>
        </div>
    </div>
</div>

{{-- Quick Stats --}}
<div class="grid grid-cols-3 gap-3 mb-6">
    <div class="card !p-3 text-center">
        <p class="text-lg font-bold text-white">{{ $user->enrollments->count() }}</p>
        <p class="text-text-muted text-xs">Courses</p>
    </div>
    <div class="card !p-3 text-center">
        <p class="text-lg font-bold text-white">{{ $user->certificates->count() }}</p>
        <p class="text-text-muted text-xs">Certificates</p>
    </div>
    <div class="card !p-3 text-center">
        <p class="text-lg font-bold text-white">{{ $user->enrollments->where('status', 'completed')->count() }}</p>
        <p class="text-text-muted text-xs">Completed</p>
    </div>
</div>

{{-- Edit Profile Form --}}
<div class="card mb-6">
    <h3 class="text-lg font-semibold text-white mb-4">Edit Profile</h3>
    <form method="POST" action="{{ route('student.profile.update') }}" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="text-text-muted text-sm mb-1 block">Full Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-white text-sm focus:outline-none focus:border-secondary/50 transition-colors" required>
            @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="text-text-muted text-sm mb-1 block">Email</label>
            <input type="email" value="{{ $user->email }}" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-text-muted text-sm cursor-not-allowed" disabled>
            <p class="text-text-muted text-xs mt-1">Email cannot be changed</p>
        </div>
        <div>
            <label class="text-text-muted text-sm mb-1 block">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="+91 XXXXX XXXXX" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-white text-sm placeholder-text-muted focus:outline-none focus:border-secondary/50 transition-colors">
            @error('phone')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="btn-primary">Save Changes</button>
    </form>
</div>

{{-- Account Settings --}}
<div class="card">
    <h3 class="text-lg font-semibold text-white mb-4">Account Settings</h3>
    <div class="space-y-3">
        <div class="flex items-center justify-between py-3 border-b border-white/5">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                <span class="text-white text-sm">Change Password</span>
            </div>
            <button class="text-secondary text-sm hover:underline">Update</button>
        </div>
        <div class="flex items-center justify-between py-3 border-b border-white/5">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                <span class="text-white text-sm">Notification Preferences</span>
            </div>
            <button class="text-secondary text-sm hover:underline">Manage</button>
        </div>
        <div class="flex items-center justify-between py-3">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                <span class="text-white text-sm">Logout</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-400 text-sm hover:underline">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
