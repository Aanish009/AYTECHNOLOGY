@extends('layouts.app')
@section('title', 'Login - Fire Academy')

@section('content')
<section class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4">
    <div class="w-full max-w-md">
        <div class="card p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-text-muted">Sign in to continue your learning journey</p>
            </div>

            @if(session('status'))
                <div class="mb-4 p-3 rounded-lg bg-green-500/10 border border-green-500/20 text-green-400 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-text-muted mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white placeholder-text-muted focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-colors"
                        placeholder="you@example.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-medium text-text-muted">Password</label>
                        <a href="{{ route('password.request') }}" class="text-xs text-secondary hover:underline">Forgot password?</a>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white placeholder-text-muted focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-colors"
                        placeholder="Enter your password">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded border-white/20 bg-background text-secondary focus:ring-secondary">
                    <label for="remember" class="ml-2 text-sm text-text-muted">Remember me</label>
                </div>

                <button type="submit" class="btn-primary w-full text-center">Sign In</button>
            </form>

            <p class="mt-6 text-center text-sm text-text-muted">
                Don't have an account? <a href="{{ route('register') }}" class="text-secondary hover:underline font-medium">Create one</a>
            </p>
        </div>
    </div>
</section>
@endsection
