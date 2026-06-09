@extends('layouts.app')
@section('title', 'Blog - Fire Academy')

@section('content')
<section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="container-custom mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Our <span class="gradient-text">Blog</span></h1>
            <p class="text-text-muted text-lg">Stay updated with the latest in fire safety and training</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="card group">
                <div class="aspect-video bg-gradient-to-br from-secondary/10 to-primary/20 rounded-lg mb-4 overflow-hidden">
                    @if($blog->featured_image)
                        <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="space-y-3">
                    <span class="text-xs text-secondary">{{ $blog->published_at?->format('M d, Y') }}</span>
                    <h3 class="font-semibold text-white group-hover:text-secondary transition-colors">{{ $blog->title }}</h3>
                    <p class="text-text-muted text-sm line-clamp-2">{{ $blog->excerpt }}</p>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-text-muted text-lg">No blog posts yet. Check back soon!</p>
            </div>
            @endforelse
        </div>

        <div class="mt-8">{{ $blogs->links() }}</div>
    </div>
</section>
@endsection
