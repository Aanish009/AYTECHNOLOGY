@extends('layouts.app')
@section('title', 'About Us - Fire Academy')

@section('content')
<section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="container-custom mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About <span class="gradient-text">Fire Academy</span></h1>
            <p class="text-text-muted text-lg max-w-3xl mx-auto">Empowering fire safety professionals and industrial workers with world-class training and certification programs since 2020.</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-center mb-20">
            <div class="space-y-6">
                <h2 class="text-3xl font-bold">Our <span class="text-secondary">Mission</span></h2>
                <p class="text-text-muted leading-relaxed">Fire Academy is dedicated to making fire safety education accessible, affordable, and effective. We believe that every professional deserves access to high-quality training that can save lives and protect communities.</p>
                <p class="text-text-muted leading-relaxed">Our platform combines cutting-edge technology with expert instruction to deliver an unparalleled learning experience. From basic fire safety awareness to advanced fire officer certification, we cover the full spectrum of safety education.</p>
            </div>
            <div class="card p-8 space-y-6">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-secondary/20 rounded-lg flex items-center justify-center"><span class="text-2xl">🎯</span></div>
                    <div><h4 class="text-white font-semibold">Our Vision</h4><p class="text-text-muted text-sm">A fire-safe India with trained professionals in every workplace.</p></div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-secondary/20 rounded-lg flex items-center justify-center"><span class="text-2xl">💡</span></div>
                    <div><h4 class="text-white font-semibold">Innovation</h4><p class="text-text-muted text-sm">AI-powered learning with Fire AI assistant.</p></div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-secondary/20 rounded-lg flex items-center justify-center"><span class="text-2xl">🏆</span></div>
                    <div><h4 class="text-white font-semibold">Excellence</h4><p class="text-text-muted text-sm">Industry-recognized certifications with QR verification.</p></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-20">
            <div class="text-center card"><p class="text-3xl font-bold gradient-text">10K+</p><p class="text-text-muted text-sm mt-1">Students</p></div>
            <div class="text-center card"><p class="text-3xl font-bold gradient-text">50+</p><p class="text-text-muted text-sm mt-1">Courses</p></div>
            <div class="text-center card"><p class="text-3xl font-bold gradient-text">25+</p><p class="text-text-muted text-sm mt-1">Experts</p></div>
            <div class="text-center card"><p class="text-3xl font-bold gradient-text">6+</p><p class="text-text-muted text-sm mt-1">Years</p></div>
        </div>
    </div>
</section>
@endsection
