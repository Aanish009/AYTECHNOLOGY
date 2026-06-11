@extends('layouts.app')
@section('title', 'Reset Password - Fire Academy')

@section('content')
<section class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4">
    <div class="w-full max-w-md">
        <div class="card p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-white mb-2">Set New Password</h1>
            </div>
            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <label for="email" class="block text-sm font-medium text-text-muted mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', request()->email) }}" required
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white focus:border-secondary focus:ring-1 focus:ring-secondary outline-none">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-text-muted mb-2">New Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white focus:border-secondary focus:ring-1 focus:ring-secondary outline-none">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-text-muted mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white focus:border-secondary focus:ring-1 focus:ring-secondary outline-none">
                </div>
                <button type="submit" class="btn-primary w-full text-center">Reset Password</button>
            </form>
        </div>
    </div>
</section>
@endsection
