@extends('layouts.app')
@section('title', 'Forgot Password - Fire Academy')

@section('content')
<section class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4">
    <div class="w-full max-w-md">
        <div class="card p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-white mb-2">Reset Password</h1>
                <p class="text-text-muted">Enter your email to receive a reset link</p>
            </div>

            @if(session('status'))
                <div class="mb-4 p-3 rounded-lg bg-green-500/10 border border-green-500/20 text-green-400 text-sm">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-text-muted mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white placeholder-text-muted focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-colors"
                        placeholder="you@example.com">
                    @error('email') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="btn-primary w-full text-center">Send Reset Link</button>
            </form>
            <p class="mt-6 text-center text-sm text-text-muted">
                <a href="{{ route('login') }}" class="text-secondary hover:underline">Back to login</a>
            </p>
        </div>
    </div>
</section>
@endsection
