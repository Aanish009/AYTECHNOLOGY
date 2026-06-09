@extends('layouts.app')
@section('title', 'Courses - Fire Academy')

@section('content')
<section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="container-custom mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Our <span class="gradient-text">Courses</span></h1>
            <p class="text-text-muted text-lg">Browse our comprehensive fire safety training programs</p>
        </div>

        {{-- Filters --}}
        <div class="flex flex-wrap gap-4 mb-8">
            <form method="GET" class="flex flex-wrap gap-4 w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search courses..."
                    class="flex-1 min-w-[200px] px-4 py-3 bg-card border border-white/10 rounded-lg text-white placeholder-text-muted focus:border-secondary outline-none">
                <select name="category" class="px-4 py-3 bg-card border border-white/10 rounded-lg text-white focus:border-secondary outline-none">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <select name="level" class="px-4 py-3 bg-card border border-white/10 rounded-lg text-white focus:border-secondary outline-none">
                    <option value="">All Levels</option>
                    <option value="beginner" {{ request('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ request('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ request('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
                <button type="submit" class="btn-primary">Filter</button>
            </form>
        </div>

        {{-- Course Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($courses as $course)
            <a href="{{ route('courses.show', $course->slug) }}" class="card group">
                <div class="relative overflow-hidden rounded-lg mb-4">
                    <div class="aspect-video bg-gradient-to-br from-secondary/20 to-primary/40 flex items-center justify-center">
                        @if($course->thumbnail)
                            <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-12 h-12 text-secondary/50" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
                        @endif
                    </div>
                    <span class="absolute top-3 left-3 px-2 py-1 bg-secondary/90 text-white text-xs rounded-md font-medium capitalize">{{ $course->level }}</span>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs text-secondary bg-secondary/10 px-2 py-0.5 rounded">{{ $course->category->name ?? 'General' }}</span>
                    </div>
                    <h3 class="font-semibold text-white group-hover:text-secondary transition-colors">{{ $course->title }}</h3>
                    <p class="text-text-muted text-sm line-clamp-2">{{ $course->short_description }}</p>
                    <div class="flex items-center justify-between pt-2 border-t border-white/5">
                        <span class="text-secondary font-bold">{{ $course->price > 0 ? '₹' . number_format($course->price) : 'Free' }}</span>
                        <span class="text-text-muted text-xs">{{ $course->total_lectures }} lectures</span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-text-muted text-lg">No courses found. Check back soon!</p>
            </div>
            @endforelse
        </div>

        <div class="mt-8">{{ $courses->links() }}</div>
    </div>
</section>
@endsection
