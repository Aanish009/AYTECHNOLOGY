<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0F0F0F">
    <title>@yield('title', 'Student Dashboard - Fire Academy')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-text antialiased" x-data="{ sidebarOpen: false, profileOpen: false }">
    <div class="flex min-h-screen">
        {{-- Sidebar (Desktop) --}}
        <aside class="hidden lg:flex lg:flex-col w-64 bg-card border-r border-white/5 fixed h-full z-40">
            <div class="p-6 border-b border-white/5">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-secondary to-accent rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    </div>
                    <span class="text-lg font-bold text-white">Fire<span class="text-secondary">Academy</span></span>
                </a>
            </div>
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('student.dashboard') ? 'bg-secondary/10 text-secondary font-medium' : 'text-text-muted hover:text-white hover:bg-white/5' }} text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('student.courses') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('student.courses*') ? 'bg-secondary/10 text-secondary font-medium' : 'text-text-muted hover:text-white hover:bg-white/5' }} text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <span>My Courses</span>
                </a>
                <a href="{{ route('student.progress') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('student.progress') ? 'bg-secondary/10 text-secondary font-medium' : 'text-text-muted hover:text-white hover:bg-white/5' }} text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <span>My Progress</span>
                </a>
                <a href="{{ route('student.quizzes') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('student.quizzes*') ? 'bg-secondary/10 text-secondary font-medium' : 'text-text-muted hover:text-white hover:bg-white/5' }} text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    <span>Quizzes & Exams</span>
                </a>
                <a href="{{ route('student.materials') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('student.materials') ? 'bg-secondary/10 text-secondary font-medium' : 'text-text-muted hover:text-white hover:bg-white/5' }} text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    <span>Notes & Materials</span>
                </a>
                <a href="{{ route('student.mentors') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('student.mentors') ? 'bg-secondary/10 text-secondary font-medium' : 'text-text-muted hover:text-white hover:bg-white/5' }} text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <span>Mentors</span>
                </a>
                <a href="{{ route('student.refer') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('student.refer') ? 'bg-secondary/10 text-secondary font-medium' : 'text-text-muted hover:text-white hover:bg-white/5' }} text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                    <span>Refer & Earn</span>
                </a>
                <a href="{{ route('student.support') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('student.support') ? 'bg-secondary/10 text-secondary font-medium' : 'text-text-muted hover:text-white hover:bg-white/5' }} text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>24/7 Support</span>
                </a>
                <a href="{{ route('student.certificates') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('student.certificates') ? 'bg-secondary/10 text-secondary font-medium' : 'text-text-muted hover:text-white hover:bg-white/5' }} text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    <span>Certificates</span>
                </a>
            </nav>
            <div class="p-4 border-t border-white/5">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-secondary/20 flex items-center justify-center">
                        <span class="text-secondary font-bold text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-medium truncate">{{ auth()->user()->name }}</p>
                        <p class="text-text-muted text-xs truncate">Student</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="text-text-muted hover:text-red-400 text-sm transition-colors">Logout</button>
                </form>
            </div>
        </aside>

        {{-- Mobile Sidebar Overlay --}}
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/60 z-40 lg:hidden" @click="sidebarOpen = false"></div>

        {{-- Main Content --}}
        <main class="flex-1 lg:ml-64 pb-20 lg:pb-0">
            {{-- Top Header with Profile Dropdown --}}
            <header class="sticky top-0 z-30 bg-background/95 backdrop-blur-md border-b border-white/5 px-4 lg:px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-white p-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                        <h1 class="text-lg lg:text-xl font-semibold text-white">@yield('page_title', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center space-x-3">
                        {{-- Notifications --}}
                        <button class="relative text-text-muted hover:text-white transition-colors p-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-secondary rounded-full"></span>
                        </button>
                        {{-- Profile Dropdown --}}
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 p-1 rounded-lg hover:bg-white/5 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-secondary to-accent flex items-center justify-center">
                                    <span class="text-white font-bold text-xs">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>
                                <span class="hidden sm:block text-white text-sm font-medium">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-56 bg-card rounded-xl border border-white/10 shadow-xl py-2 z-50">
                                <div class="px-4 py-3 border-b border-white/5">
                                    <p class="text-white text-sm font-medium">{{ auth()->user()->name }}</p>
                                    <p class="text-text-muted text-xs">{{ auth()->user()->email }}</p>
                                </div>
                                <a href="{{ route('student.profile') }}" class="flex items-center space-x-2 px-4 py-2.5 text-sm text-text-muted hover:text-white hover:bg-white/5 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    <span>My Profile</span>
                                </a>
                                <a href="{{ route('student.certificates') }}" class="flex items-center space-x-2 px-4 py-2.5 text-sm text-text-muted hover:text-white hover:bg-white/5 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    <span>Certificates</span>
                                </a>
                                <a href="{{ route('student.refer') }}" class="flex items-center space-x-2 px-4 py-2.5 text-sm text-text-muted hover:text-white hover:bg-white/5 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                                    <span>Refer & Earn</span>
                                </a>
                                <div class="border-t border-white/5 mt-1 pt-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center space-x-2 w-full px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Flash Messages --}}
            @if(session('success'))
            <div class="mx-4 lg:mx-6 mt-4 bg-green-500/10 border border-green-500/20 rounded-lg px-4 py-3 text-green-400 text-sm">
                {{ session('success') }}
            </div>
            @endif

            {{-- Page Content --}}
            <div class="p-4 lg:p-6">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Bottom Navigation Bar (Mobile) --}}
    <nav class="fixed bottom-0 left-0 right-0 bg-card/95 backdrop-blur-md border-t border-white/10 z-50 lg:hidden safe-area-bottom">
        <div class="flex items-center justify-around px-2 py-2">
            <a href="{{ route('student.dashboard') }}" class="flex flex-col items-center py-1 px-3 {{ request()->routeIs('student.dashboard') ? 'text-secondary' : 'text-text-muted' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span class="text-[10px] mt-0.5 font-medium">Home</span>
            </a>
            <a href="{{ route('student.courses') }}" class="flex flex-col items-center py-1 px-3 {{ request()->routeIs('student.courses*') ? 'text-secondary' : 'text-text-muted' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span class="text-[10px] mt-0.5 font-medium">Courses</span>
            </a>
            <a href="{{ route('student.quizzes') }}" class="flex flex-col items-center py-1 px-3 {{ request()->routeIs('student.quizzes*') ? 'text-secondary' : 'text-text-muted' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                <span class="text-[10px] mt-0.5 font-medium">Quizzes</span>
            </a>
            <a href="{{ route('student.support') }}" class="flex flex-col items-center py-1 px-3 {{ request()->routeIs('student.support') ? 'text-secondary' : 'text-text-muted' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <span class="text-[10px] mt-0.5 font-medium">Support</span>
            </a>
            <a href="{{ route('student.profile') }}" class="flex flex-col items-center py-1 px-3 {{ request()->routeIs('student.profile') ? 'text-secondary' : 'text-text-muted' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span class="text-[10px] mt-0.5 font-medium">Profile</span>
            </a>
        </div>
    </nav>
</body>
</html>
