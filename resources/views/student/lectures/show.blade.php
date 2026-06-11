@extends('layouts.student-app')
@section('title', $lesson->title . ' - Fire Academy')
@section('page_title', $lesson->title)

@section('content')
<div class="lg:flex lg:gap-6">
    {{-- Main Content: Video Player --}}
    <div class="flex-1 min-w-0">
        {{-- Video Player Area --}}
        <div class="relative bg-black rounded-xl overflow-hidden mb-4 aspect-video">
            @if($lesson->video_url)
            <iframe src="{{ $lesson->video_url }}" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @else
            <div class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-br from-card to-background">
                <div class="w-20 h-20 rounded-full bg-secondary/20 flex items-center justify-center mb-4">
                    <svg class="w-10 h-10 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
                </div>
                <p class="text-text-muted text-sm">{{ ucfirst($lesson->type ?? 'Video') }} content</p>
                <p class="text-text-muted text-xs mt-1">{{ $lesson->duration_minutes ?? 0 }} minutes</p>
            </div>
            @endif
        </div>

        {{-- Lesson Info --}}
        <div class="card mb-4">
            <div class="flex items-center justify-between mb-3">
                <div>
                    <h2 class="text-lg font-bold text-white">{{ $lesson->title }}</h2>
                    <p class="text-text-muted text-xs mt-0.5">{{ $course->title }} &bull; {{ $lesson->module->title ?? '' }}</p>
                </div>
                @if(!$progress->is_completed)
                <form method="POST" action="{{ route('student.lesson.complete', [$course, $lesson]) }}">
                    @csrf
                    <button type="submit" class="btn-primary !py-2 !px-4 text-sm flex items-center space-x-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Mark Complete</span>
                    </button>
                </form>
                @else
                <span class="flex items-center space-x-1 text-green-400 text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Completed</span>
                </span>
                @endif
            </div>
            @if($lesson->description)
            <div class="text-text-muted text-sm leading-relaxed border-t border-white/5 pt-3">
                {!! nl2br(e($lesson->description)) !!}
            </div>
            @endif

            @if($lesson->pdf_file)
            <div class="mt-3 pt-3 border-t border-white/5">
                <a href="{{ asset('storage/' . $lesson->pdf_file) }}" target="_blank" class="flex items-center space-x-2 text-secondary text-sm hover:underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Download Lesson Material (PDF)</span>
                </a>
            </div>
            @endif
        </div>

        {{-- Navigation --}}
        <div class="flex items-center justify-between">
            @if($prevLesson)
            <a href="{{ route('student.lecture', [$course, $prevLesson]) }}" class="flex items-center space-x-2 text-text-muted hover:text-white text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                <span>Previous Lesson</span>
            </a>
            @else
            <span></span>
            @endif
            @if($nextLesson)
            <a href="{{ route('student.lecture', [$course, $nextLesson]) }}" class="flex items-center space-x-2 text-secondary hover:text-accent text-sm font-medium transition-colors">
                <span>Next Lesson</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            @endif
        </div>
    </div>

    {{-- Sidebar: Course Playlist --}}
    <div class="lg:w-80 mt-6 lg:mt-0">
        <div class="card lg:sticky lg:top-20 max-h-[calc(100vh-6rem)] overflow-y-auto">
            <h3 class="text-sm font-semibold text-white mb-3">Course Content</h3>
            @foreach($course->modules as $module)
            <div class="mb-3 last:mb-0">
                <p class="text-text-muted text-xs font-medium uppercase tracking-wider mb-2">{{ $module->title }}</p>
                @foreach($module->lessons as $l)
                <a href="{{ route('student.lecture', [$course, $l]) }}" class="flex items-center space-x-2 p-2 rounded-lg text-sm transition-colors {{ $l->id === $lesson->id ? 'bg-secondary/10 text-secondary' : 'text-text-muted hover:text-white hover:bg-white/5' }}">
                    @if(isset($lessonProgress[$l->id]) && $lessonProgress[$l->id])
                    <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    @elseif($l->id === $lesson->id)
                    <svg class="w-4 h-4 text-secondary shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
                    @else
                    <div class="w-4 h-4 rounded-full border border-white/20 shrink-0"></div>
                    @endif
                    <span class="truncate">{{ $l->title }}</span>
                </a>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
