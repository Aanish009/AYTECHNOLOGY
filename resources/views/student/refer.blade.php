@extends('layouts.student-app')
@section('title', 'Refer & Earn - Fire Academy')
@section('page_title', 'Refer & Earn')

@section('content')
{{-- Hero Banner --}}
<div class="card mb-6 bg-gradient-to-br from-secondary/20 to-accent/10 !border-secondary/20">
    <div class="text-center py-4">
        <div class="w-16 h-16 mx-auto rounded-full bg-secondary/20 flex items-center justify-center mb-3">
            <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
        </div>
        <h2 class="text-2xl font-bold text-white mb-2">Refer Friends & Earn Rewards!</h2>
        <p class="text-text-muted text-sm max-w-md mx-auto">Share your referral code with friends. When they sign up and enroll in a course, you both earn Fire Coins and exclusive discounts!</p>
    </div>
</div>

{{-- Referral Code --}}
<div class="card mb-6" x-data="{ copied: false }">
    <h3 class="text-lg font-semibold text-white mb-3">Your Referral Code</h3>
    <div class="flex items-center space-x-3">
        <div class="flex-1 bg-white/5 rounded-lg px-4 py-3 border border-white/10 font-mono text-lg text-accent font-bold tracking-widest text-center">
            {{ $referralCode }}
        </div>
        <button @click="navigator.clipboard.writeText('{{ $referralCode }}'); copied = true; setTimeout(() => copied = false, 2000)" class="btn-primary !py-3 !px-4 shrink-0">
            <span x-show="!copied" class="flex items-center space-x-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                <span>Copy</span>
            </span>
            <span x-show="copied" class="flex items-center space-x-1 text-green-400" x-cloak>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Copied!</span>
            </span>
        </button>
    </div>
    <div class="flex items-center space-x-2 mt-4">
        <a href="https://wa.me/?text=Join%20Fire%20Academy%20using%20my%20referral%20code%20{{ $referralCode }}%20and%20get%20discounts!" target="_blank" class="flex-1 flex items-center justify-center space-x-2 bg-green-600/20 hover:bg-green-600/30 text-green-400 rounded-lg py-2.5 text-sm font-medium transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
            <span>WhatsApp</span>
        </a>
        <button onclick="navigator.share && navigator.share({ title: 'Fire Academy', text: 'Join Fire Academy with my code {{ $referralCode }}!', url: window.location.origin + '/register?ref={{ $referralCode }}' })" class="flex-1 flex items-center justify-center space-x-2 bg-blue-600/20 hover:bg-blue-600/30 text-blue-400 rounded-lg py-2.5 text-sm font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
            <span>Share</span>
        </button>
    </div>
</div>

{{-- How It Works --}}
<div class="card mb-6">
    <h3 class="text-lg font-semibold text-white mb-4">How It Works</h3>
    <div class="space-y-4">
        <div class="flex items-start space-x-3">
            <div class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center shrink-0">
                <span class="text-secondary font-bold text-sm">1</span>
            </div>
            <div>
                <p class="text-white text-sm font-medium">Share Your Code</p>
                <p class="text-text-muted text-xs">Send your unique referral code to friends via WhatsApp, social media, or email.</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <div class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center shrink-0">
                <span class="text-secondary font-bold text-sm">2</span>
            </div>
            <div>
                <p class="text-white text-sm font-medium">Friend Signs Up</p>
                <p class="text-text-muted text-xs">Your friend registers on Fire Academy using your referral code.</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <div class="w-8 h-8 rounded-full bg-accent/20 flex items-center justify-center shrink-0">
                <span class="text-accent font-bold text-sm">3</span>
            </div>
            <div>
                <p class="text-white text-sm font-medium">Both Earn Rewards!</p>
                <p class="text-text-muted text-xs">You get 50 Fire Coins + 10% discount. Your friend gets 25 Fire Coins on their first purchase.</p>
            </div>
        </div>
    </div>
</div>

{{-- Referred Friends --}}
<div class="card">
    <h3 class="text-lg font-semibold text-white mb-4">Your Referrals ({{ $referredUsers->count() }})</h3>
    @forelse($referredUsers as $friend)
    <div class="flex items-center justify-between py-3 border-b border-white/5 last:border-0">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 rounded-full bg-secondary/20 flex items-center justify-center">
                <span class="text-secondary font-bold text-xs">{{ substr($friend->name, 0, 1) }}</span>
            </div>
            <div>
                <p class="text-white text-sm font-medium">{{ $friend->name }}</p>
                <p class="text-text-muted text-xs">Joined {{ $friend->created_at->diffForHumans() }}</p>
            </div>
        </div>
        <span class="text-accent text-xs font-medium">+50 Coins</span>
    </div>
    @empty
    <p class="text-text-muted text-sm text-center py-4">No referrals yet. Share your code to start earning!</p>
    @endforelse
</div>
@endsection
