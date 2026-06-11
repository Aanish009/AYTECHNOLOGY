@extends('layouts.student-app')
@section('title', 'Mentors - Fire Academy')
@section('page_title', 'Your Mentors')

@section('content')
<div class="mb-6">
    <p class="text-text-muted text-sm">Connect with expert fire safety trainers and mentors who are here to guide you.</p>
</div>

{{-- Mentors Grid --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($mentors as $mentor)
    <div class="card text-center hover:border-secondary/40 transition-all">
        <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-secondary to-accent flex items-center justify-center mb-3">
            @if($mentor->avatar)
            <img src="{{ asset('storage/' . $mentor->avatar) }}" alt="{{ $mentor->name }}" class="w-full h-full rounded-full object-cover">
            @else
            <span class="text-white text-2xl font-bold">{{ substr($mentor->name, 0, 1) }}</span>
            @endif
        </div>
        <h3 class="text-white font-semibold text-sm">{{ $mentor->name }}</h3>
        <p class="text-secondary text-xs mt-0.5">{{ $mentor->instructorProfile->specialization ?? 'Fire Safety Expert' }}</p>
        <p class="text-text-muted text-xs mt-1">{{ $mentor->instructorProfile->bio ?? 'Experienced fire safety trainer' }}</p>

        <div class="flex items-center justify-center space-x-4 mt-3 text-xs text-text-muted">
            <span class="flex items-center space-x-1">
                <svg class="w-3.5 h-3.5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <span>{{ $mentor->instructorProfile->rating ?? '4.8' }}</span>
            </span>
            <span>{{ $mentor->courses()->count() }} Courses</span>
        </div>

        <div class="flex items-center space-x-2 mt-4">
            <button class="flex-1 btn-primary !py-2 text-xs" onclick="alert('Messaging coming soon!')">
                <span class="flex items-center justify-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <span>Message</span>
                </span>
            </button>
            <button class="flex-1 btn-secondary !py-2 text-xs !border !px-3">View Profile</button>
        </div>
    </div>
    @empty
    {{-- Show placeholder mentors when no instructors exist --}}
    @php
    $placeholderMentors = [
        ['name' => 'Rajesh Kumar', 'spec' => 'Fire Safety Engineer', 'rating' => '4.9', 'courses' => 12],
        ['name' => 'Priya Sharma', 'spec' => 'Industrial Safety Expert', 'rating' => '4.8', 'courses' => 8],
        ['name' => 'Anil Patel', 'spec' => 'Emergency Response Trainer', 'rating' => '4.7', 'courses' => 15],
        ['name' => 'Meena Singh', 'spec' => 'Electrical Safety Specialist', 'rating' => '4.9', 'courses' => 6],
        ['name' => 'Vikram Joshi', 'spec' => 'Fire Officer (Retd.)', 'rating' => '4.8', 'courses' => 10],
        ['name' => 'Sunita Rao', 'spec' => 'Workplace Safety Consultant', 'rating' => '4.6', 'courses' => 9],
    ];
    @endphp
    @foreach($placeholderMentors as $pm)
    <div class="card text-center hover:border-secondary/40 transition-all">
        <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-secondary to-accent flex items-center justify-center mb-3">
            <span class="text-white text-2xl font-bold">{{ substr($pm['name'], 0, 1) }}</span>
        </div>
        <h3 class="text-white font-semibold text-sm">{{ $pm['name'] }}</h3>
        <p class="text-secondary text-xs mt-0.5">{{ $pm['spec'] }}</p>
        <p class="text-text-muted text-xs mt-1">Certified fire safety professional with years of industry experience.</p>

        <div class="flex items-center justify-center space-x-4 mt-3 text-xs text-text-muted">
            <span class="flex items-center space-x-1">
                <svg class="w-3.5 h-3.5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <span>{{ $pm['rating'] }}</span>
            </span>
            <span>{{ $pm['courses'] }} Courses</span>
        </div>

        <div class="flex items-center space-x-2 mt-4">
            <button class="flex-1 btn-primary !py-2 text-xs" onclick="alert('Messaging coming soon!')">
                <span class="flex items-center justify-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <span>Message</span>
                </span>
            </button>
            <button class="flex-1 btn-secondary !py-2 text-xs !border !px-3">View Profile</button>
        </div>
    </div>
    @endforeach
    @endforelse
</div>
@endsection
