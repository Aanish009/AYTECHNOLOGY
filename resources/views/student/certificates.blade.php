@extends('layouts.student-app')
@section('title', 'My Certificates - Fire Academy')
@section('page_title', 'My Certificates')

@section('content')
<div class="mb-6">
    <p class="text-text-muted text-sm">Your earned certificates and achievements from completed courses.</p>
</div>

@forelse($certificates as $cert)
<div class="card mb-4 hover:border-accent/30 transition-all">
    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
        <div class="w-full sm:w-28 h-20 rounded-lg bg-gradient-to-br from-accent/20 to-secondary/10 flex items-center justify-center shrink-0 border border-accent/20">
            <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
        </div>
        <div class="flex-1 min-w-0">
            <h3 class="text-white font-semibold text-sm">{{ $cert->course->title ?? 'Certificate' }}</h3>
            <p class="text-text-muted text-xs mt-0.5">Certificate ID: {{ $cert->certificate_number ?? 'FA-' . str_pad($cert->id, 6, '0', STR_PAD_LEFT) }}</p>
            <div class="flex flex-wrap items-center gap-3 mt-2 text-xs text-text-muted">
                <span>Issued: {{ $cert->issued_at?->format('M d, Y') ?? $cert->created_at->format('M d, Y') }}</span>
                <span class="px-2 py-0.5 rounded-full bg-green-500/20 text-green-400">Verified</span>
            </div>
        </div>
        <div class="flex items-center space-x-2 shrink-0">
            <button class="btn-primary !py-2 !px-3 text-xs" onclick="alert('Certificate download coming in next phase!')">
                <span class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Download</span>
                </span>
            </button>
            <button class="btn-secondary !py-2 !px-3 text-xs !border" onclick="alert('Certificate sharing coming in next phase!')">Share</button>
        </div>
    </div>
</div>
@empty
<div class="card text-center py-12">
    <div class="w-20 h-20 mx-auto rounded-full bg-white/5 flex items-center justify-center mb-4">
        <svg class="w-10 h-10 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
    </div>
    <h3 class="text-white font-semibold text-lg mb-2">No certificates yet</h3>
    <p class="text-text-muted text-sm mb-4">Complete your courses to earn certificates!</p>
    <a href="{{ route('student.courses') }}" class="btn-primary inline-block">View My Courses</a>
</div>
@endforelse
@endsection
