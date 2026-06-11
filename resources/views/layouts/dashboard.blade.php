<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - Fire Academy')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-text antialiased">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="hidden lg:flex lg:flex-col w-64 bg-card border-r border-white/5 fixed h-full">
            <div class="p-6 border-b border-white/5">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-secondary to-accent rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    </div>
                    <span class="text-lg font-bold text-white">Fire<span class="text-secondary">Academy</span></span>
                </a>
            </div>
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                @yield('sidebar')
            </nav>
            <div class="p-4 border-t border-white/5">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-secondary/20 flex items-center justify-center">
                        <span class="text-secondary font-bold text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-medium truncate">{{ auth()->user()->name }}</p>
                        <p class="text-text-muted text-xs truncate">{{ auth()->user()->role->name ?? '' }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="text-text-muted hover:text-red-400 text-sm transition-colors">Logout</button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 lg:ml-64">
            <header class="sticky top-0 z-30 bg-background/95 backdrop-blur-md border-b border-white/5 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-semibold text-white">@yield('page_title', 'Dashboard')</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-text-muted text-sm">{{ now()->format('M d, Y') }}</span>
                    </div>
                </div>
            </header>
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
