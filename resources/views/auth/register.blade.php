@extends('layouts.app')
@section('title', 'Register - Fire Academy')

@section('content')
<section class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4">
    <div class="w-full max-w-md">
        <div class="card p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-white mb-2">Create Account</h1>
                <p class="text-text-muted">Join Fire Academy and start learning</p>
            </div>

            <form method="POST" action="{{ route('register.post') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-text-muted mb-2">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white placeholder-text-muted focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-colors"
                        placeholder="Your full name">
                    @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-text-muted mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white placeholder-text-muted focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-colors"
                        placeholder="you@example.com">
                    @error('email') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-text-muted mb-2">I am a</label>
                    <select id="role" name="role"
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-colors">
                        <option value="student">Student</option>
                        <option value="instructor">Instructor</option>
                    </select>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-text-muted mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white placeholder-text-muted focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-colors"
                        placeholder="Min 8 characters">
                    @error('password') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-text-muted mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white placeholder-text-muted focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-colors"
                        placeholder="Confirm your password">
                </div>

                <div>
                    <label for="referral_code" class="block text-sm font-medium text-text-muted mb-2">Referral Code (Optional)</label>
                    <input type="text" id="referral_code" name="referral_code" value="{{ old('referral_code') }}"
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white placeholder-text-muted focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-colors"
                        placeholder="Enter referral code">
                </div>

                <button type="submit" class="btn-primary w-full text-center">Create Account</button>
            </form>

            <p class="mt-6 text-center text-sm text-text-muted">
                Already have an account? <a href="{{ route('login') }}" class="text-secondary hover:underline font-medium">Sign in</a>
            </p>
        </div>
    </div>
</section>
@endsection
