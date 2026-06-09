@extends('layouts.app')
@section('title', $blog->title . ' - Fire Academy Blog')

@section('content')
<section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="container-custom mx-auto max-w-4xl">
        <article>
            <div class="mb-8">
                <span class="text-secondary text-sm">{{ $blog->published_at?->format('F d, Y') }} &bull; {{ $blog->category->name ?? 'General' }}</span>
                <h1 class="text-3xl md:text-4xl font-bold text-white mt-2 mb-4">{{ $blog->title }}</h1>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-secondary/20 flex items-center justify-center">
                        <span class="text-secondary font-bold">{{ substr($blog->author->name ?? 'A', 0, 1) }}</span>
                    </div>
                    <span class="text-text-muted text-sm">{{ $blog->author->name ?? 'Admin' }}</span>
                </div>
            </div>
            <div class="prose prose-invert max-w-none text-text-muted leading-relaxed">{!! $blog->content !!}</div>
        </article>
    </div>
</section>
@endsection
