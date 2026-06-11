<nav x-data="mobileMenu" class="fixed top-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-md border-b border-white/5">
    <div class="container-custom mx-auto">
        <div class="flex items-center justify-between h-16 md:h-20 px-4 sm:px-6 lg:px-8">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-gradient-to-br from-secondary to-accent rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-white">Fire<span class="text-secondary">Academy</span></span>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-sm font-medium text-white hover:text-secondary transition-colors">Home</a>
                <a href="{{ route('courses.index') }}" class="text-sm font-medium text-text-muted hover:text-secondary transition-colors">Courses</a>
                <a href="{{ route('about') }}" class="text-sm font-medium text-text-muted hover:text-secondary transition-colors">About</a>
                <a href="{{ route('blog.index') }}" class="text-sm font-medium text-text-muted hover:text-secondary transition-colors">Blog</a>
                <a href="{{ route('contact') }}" class="text-sm font-medium text-text-muted hover:text-secondary transition-colors">Contact</a>
            </div>

            {{-- Auth Buttons --}}
            <div class="hidden lg:flex items-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-primary text-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-text-muted hover:text-white transition-colors">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary text-sm">Get Started</a>
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="toggle()" class="lg:hidden text-white p-2">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-cloak x-transition class="lg:hidden bg-card border-t border-white/5">
        <div class="px-4 py-6 space-y-4">
            <a href="{{ route('home') }}" class="block text-white font-medium">Home</a>
            <a href="{{ route('courses.index') }}" class="block text-text-muted hover:text-white">Courses</a>
            <a href="{{ route('about') }}" class="block text-text-muted hover:text-white">About</a>
            <a href="{{ route('blog.index') }}" class="block text-text-muted hover:text-white">Blog</a>
            <a href="{{ route('contact') }}" class="block text-text-muted hover:text-white">Contact</a>
            <hr class="border-white/10">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-primary block text-center">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block text-text-muted hover:text-white">Login</a>
                <a href="{{ route('register') }}" class="btn-primary block text-center">Get Started</a>
            @endauth
        </div>
    </div>
</nav>
