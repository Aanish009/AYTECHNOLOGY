@extends('layouts.app')
@section('title', 'FAQ - Fire Academy')

@section('content')
<section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="container-custom mx-auto max-w-3xl">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Frequently Asked <span class="gradient-text">Questions</span></h1>
            <p class="text-text-muted text-lg">Find answers to common questions about Fire Academy.</p>
        </div>

        <div class="space-y-4">
            @foreach($faqs as $faq)
            <div x-data="{ open: false }" class="card cursor-pointer" @click="open = !open">
                <div class="flex items-center justify-between">
                    <h3 class="font-semibold text-white pr-4">{{ $faq->question }}</h3>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-secondary shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
                <div x-show="open" x-collapse class="mt-4 pt-4 border-t border-white/5">
                    <p class="text-text-muted text-sm leading-relaxed">{{ $faq->answer }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
