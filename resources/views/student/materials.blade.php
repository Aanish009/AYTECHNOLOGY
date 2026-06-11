@extends('layouts.student-app')
@section('title', 'Notes & Materials - Fire Academy')
@section('page_title', 'Notes & Materials')

@section('content')
<div class="mb-6">
    <p class="text-text-muted text-sm">Download study notes, PDFs, and reference materials from your enrolled courses.</p>
</div>

{{-- Materials by Course --}}
@forelse($courses as $course)
@php
    $courseMaterials = $lessons->where('course_id', $course->id);
@endphp
@if($courseMaterials->count() > 0)
<div class="card mb-4">
    <div class="flex items-center space-x-3 mb-4">
        <div class="w-10 h-10 rounded-lg bg-secondary/20 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
        <div>
            <h3 class="text-white font-semibold text-sm">{{ $course->title }}</h3>
            <p class="text-text-muted text-xs">{{ $courseMaterials->count() }} materials available</p>
        </div>
    </div>
    @foreach($courseMaterials as $material)
    <div class="flex items-center justify-between py-3 border-t border-white/5">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-lg bg-red-500/10 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-white text-sm font-medium">{{ $material->title }}</p>
                <p class="text-text-muted text-xs">{{ ucfirst($material->type ?? 'PDF') }} &bull; Lesson Material</p>
            </div>
        </div>
        @if($material->pdf_file)
        <a href="{{ asset('storage/' . $material->pdf_file) }}" target="_blank" class="flex items-center space-x-1 text-secondary text-sm hover:text-accent transition-colors shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <span>Download</span>
        </a>
        @endif
    </div>
    @endforeach
</div>
@endif
@empty
<div class="card text-center py-12">
    <div class="w-20 h-20 mx-auto rounded-full bg-white/5 flex items-center justify-center mb-4">
        <svg class="w-10 h-10 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
    </div>
    <h3 class="text-white font-semibold text-lg mb-2">No materials available</h3>
    <p class="text-text-muted text-sm">Study materials will appear here as they are added to your courses.</p>
</div>
@endforelse

@if($lessons->count() === 0 && $courses->count() > 0)
<div class="card text-center py-12">
    <div class="w-20 h-20 mx-auto rounded-full bg-white/5 flex items-center justify-center mb-4">
        <svg class="w-10 h-10 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
    </div>
    <h3 class="text-white font-semibold text-lg mb-2">No downloadable materials yet</h3>
    <p class="text-text-muted text-sm">PDF notes and documents will be available here once uploaded by instructors.</p>
</div>
@endif
@endsection
