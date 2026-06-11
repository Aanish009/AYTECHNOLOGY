@extends('layouts.app')
@section('title', $course->title . ' - Fire Academy')

@section('content')
<section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="container-custom mx-auto">
        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <span class="text-xs text-secondary bg-secondary/10 px-2 py-1 rounded">{{ $course->category->name ?? 'General' }}</span>
                        <span class="text-xs text-accent bg-accent/10 px-2 py-1 rounded capitalize">{{ $course->level }}</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $course->title }}</h1>
                    <p class="text-text-muted text-lg leading-relaxed">{{ $course->short_description }}</p>
                </div>

                <div class="flex items-center space-x-6 text-sm text-text-muted">
                    <span>{{ $course->total_lectures }} Lectures</span>
                    <span>{{ $course->duration ?? 'Self-paced' }}</span>
                    <span>{{ $course->language }}</span>
                    <span class="flex items-center"><svg class="w-4 h-4 text-accent mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>{{ number_format($course->average_rating, 1) }}</span>
                </div>

                {{-- Description --}}
                <div class="card">
                    <h3 class="text-xl font-semibold text-white mb-4">About This Course</h3>
                    <div class="text-text-muted leading-relaxed prose prose-invert max-w-none">{!! nl2br(e($course->description)) !!}</div>
                </div>

                {{-- Course Curriculum --}}
                <div class="card">
                    <h3 class="text-xl font-semibold text-white mb-4">Course Curriculum</h3>
                    <div class="space-y-3">
                        @forelse($course->modules as $module)
                        <div x-data="{ open: false }" class="border border-white/5 rounded-lg overflow-hidden">
                            <button @click="open = !open" class="w-full px-4 py-3 flex items-center justify-between bg-white/5 hover:bg-white/10 transition-colors">
                                <span class="font-medium text-white">{{ $module->title }}</span>
                                <span class="text-text-muted text-sm">{{ $module->lessons->count() }} lessons</span>
                            </button>
                            <div x-show="open" x-collapse class="px-4 py-2 space-y-2">
                                @foreach($module->lessons as $lesson)
                                <div class="flex items-center justify-between py-2 border-b border-white/5 last:border-0">
                                    <span class="text-text-muted text-sm flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
                                        {{ $lesson->title }}
                                    </span>
                                    <span class="text-text-muted text-xs">{{ $lesson->duration_minutes }}min</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @empty
                        <p class="text-text-muted">Curriculum coming soon.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <div class="card sticky top-24 space-y-6">
                    <div class="aspect-video bg-gradient-to-br from-secondary/20 to-primary/40 rounded-lg flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/50" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-white">{{ $course->price > 0 ? '₹' . number_format($course->price) : 'Free' }}</p>
                        @if($course->discount_price)
                        <p class="text-text-muted line-through">₹{{ number_format($course->discount_price) }}</p>
                        @endif
                    </div>
                    <a href="{{ route('register') }}" class="btn-primary w-full text-center block">Enroll Now</a>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-text-muted">Level</span><span class="text-white capitalize">{{ $course->level }}</span></div>
                        <div class="flex justify-between"><span class="text-text-muted">Lectures</span><span class="text-white">{{ $course->total_lectures }}</span></div>
                        <div class="flex justify-between"><span class="text-text-muted">Duration</span><span class="text-white">{{ $course->duration ?? 'Self-paced' }}</span></div>
                        <div class="flex justify-between"><span class="text-text-muted">Certificate</span><span class="text-white">{{ $course->has_certificate ? 'Yes' : 'No' }}</span></div>
                        <div class="flex justify-between"><span class="text-text-muted">Language</span><span class="text-white">{{ $course->language }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
