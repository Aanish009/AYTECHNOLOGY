@extends('layouts.app')

@section('title', 'Fire Academy - Learn Fire Safety. Save Lives.')

@section('content')
{{-- Hero Section --}}
<section class="relative min-h-screen flex items-center pt-20 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary/20 via-background to-background"></div>
    <div class="absolute top-0 right-0 w-1/2 h-full opacity-10">
        <div class="absolute top-20 right-20 w-72 h-72 bg-secondary rounded-full blur-[120px]"></div>
        <div class="absolute bottom-40 right-40 w-48 h-48 bg-accent rounded-full blur-[100px]"></div>
    </div>
    <div class="container-custom mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-secondary/10 border border-secondary/20">
                    <span class="w-2 h-2 bg-secondary rounded-full mr-2 animate-pulse"></span>
                    <span class="text-secondary text-sm font-medium">India's #1 Fire Safety Platform</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                    Learn <span class="gradient-text">Fire Safety.</span><br>
                    Save Lives.
                </h1>
                <p class="text-text-muted text-lg md:text-xl max-w-lg leading-relaxed">
                    Master fire safety, industrial safety, and emergency response with expert-led courses, AI-powered tutoring, and industry-recognized certifications.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('courses.index') }}" class="btn-primary text-center">
                        Explore Courses
                        <svg class="inline-block w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('about') }}" class="btn-secondary text-center">Learn More</a>
                </div>
                <div class="flex items-center space-x-8 pt-4">
                    <div>
                        <p class="text-2xl font-bold text-white">10K+</p>
                        <p class="text-text-muted text-sm">Students</p>
                    </div>
                    <div class="w-px h-10 bg-white/10"></div>
                    <div>
                        <p class="text-2xl font-bold text-white">50+</p>
                        <p class="text-text-muted text-sm">Courses</p>
                    </div>
                    <div class="w-px h-10 bg-white/10"></div>
                    <div>
                        <p class="text-2xl font-bold text-white">95%</p>
                        <p class="text-text-muted text-sm">Success Rate</p>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block relative">
                <div class="relative w-full aspect-square max-w-lg mx-auto">
                    <div class="absolute inset-0 bg-gradient-to-br from-secondary/20 to-accent/20 rounded-3xl transform rotate-6"></div>
                    <div class="absolute inset-0 bg-card rounded-3xl border border-white/10 flex items-center justify-center">
                        <div class="text-center space-y-4 p-8">
                            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-secondary to-accent rounded-full flex items-center justify-center">
                                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white">Start Learning Today</h3>
                            <p class="text-text-muted">Watch our introduction video</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Statistics Section --}}
<section class="section-padding bg-card/50">
    <div class="container-custom mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center space-y-2">
                <p class="text-3xl md:text-4xl font-bold gradient-text" x-data="counter" data-target="10000" x-text="Math.floor(count).toLocaleString() + '+'">10,000+</p>
                <p class="text-text-muted text-sm md:text-base">Students Trained</p>
            </div>
            <div class="text-center space-y-2">
                <p class="text-3xl md:text-4xl font-bold gradient-text" x-data="counter" data-target="50" x-text="Math.floor(count) + '+'">50+</p>
                <p class="text-text-muted text-sm md:text-base">Expert Courses</p>
            </div>
            <div class="text-center space-y-2">
                <p class="text-3xl md:text-4xl font-bold gradient-text" x-data="counter" data-target="25" x-text="Math.floor(count) + '+'">25+</p>
                <p class="text-text-muted text-sm md:text-base">Expert Trainers</p>
            </div>
            <div class="text-center space-y-2">
                <p class="text-3xl md:text-4xl font-bold gradient-text" x-data="counter" data-target="95" x-text="Math.floor(count) + '%'">95%</p>
                <p class="text-text-muted text-sm md:text-base">Certification Rate</p>
            </div>
        </div>
    </div>
</section>

{{-- Featured Courses Section --}}
<section class="section-padding">
    <div class="container-custom mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Featured <span class="gradient-text">Courses</span></h2>
            <p class="text-text-muted max-w-2xl mx-auto">Master fire safety with our comprehensive training programs designed by industry experts.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredCourses ?? [] as $course)
            <div class="card group cursor-pointer">
                <div class="relative overflow-hidden rounded-lg mb-4">
                    <div class="aspect-video bg-gradient-to-br from-secondary/20 to-primary/40 flex items-center justify-center">
                        <svg class="w-12 h-12 text-secondary/50 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
                    </div>
                    <span class="absolute top-3 left-3 px-2 py-1 bg-secondary/90 text-white text-xs rounded-md font-medium">{{ $course->level ?? 'Beginner' }}</span>
                </div>
                <div class="space-y-3">
                    <h3 class="font-semibold text-white group-hover:text-secondary transition-colors">{{ $course->title }}</h3>
                    <p class="text-text-muted text-sm line-clamp-2">{{ $course->short_description }}</p>
                    <div class="flex items-center justify-between pt-2 border-t border-white/5">
                        <span class="text-secondary font-bold">{{ $course->price > 0 ? '₹' . number_format($course->price) : 'Free' }}</span>
                        <span class="text-text-muted text-xs">{{ $course->total_lectures }} lectures</span>
                    </div>
                </div>
            </div>
            @empty
            @for($i = 0; $i < 3; $i++)
            <div class="card group cursor-pointer">
                <div class="relative overflow-hidden rounded-lg mb-4">
                    <div class="aspect-video bg-gradient-to-br from-secondary/20 to-primary/40 flex items-center justify-center">
                        <svg class="w-12 h-12 text-secondary/50 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
                    </div>
                    <span class="absolute top-3 left-3 px-2 py-1 bg-secondary/90 text-white text-xs rounded-md font-medium">{{ ['Beginner', 'Intermediate', 'Advanced'][$i] }}</span>
                </div>
                <div class="space-y-3">
                    <h3 class="font-semibold text-white group-hover:text-secondary transition-colors">{{ ['Fire Safety Fundamentals', 'Industrial Hazard Management', 'Fire Officer Leadership'][$i] }}</h3>
                    <p class="text-text-muted text-sm line-clamp-2">{{ ['Learn the basics of fire prevention, detection, and response.', 'Master industrial workplace safety standards and practices.', 'Advanced leadership training for fire department officers.'][$i] }}</p>
                    <div class="flex items-center justify-between pt-2 border-t border-white/5">
                        <span class="text-secondary font-bold">{{ ['₹499', '₹999', '₹1,499'][$i] }}</span>
                        <span class="text-text-muted text-xs">{{ [12, 24, 36][$i] }} lectures</span>
                    </div>
                </div>
            </div>
            @endfor
            @endforelse
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('courses.index') }}" class="btn-secondary">View All Courses</a>
        </div>
    </div>
</section>

{{-- Learning Categories --}}
<section class="section-padding bg-card/30">
    <div class="container-custom mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Learning <span class="gradient-text">Categories</span></h2>
            <p class="text-text-muted max-w-2xl mx-auto">Choose from our specialized training domains.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @php
            $cats = [
                ['name' => 'Fire Safety', 'icon' => '🔥', 'count' => 15],
                ['name' => 'Industrial', 'icon' => '🏭', 'count' => 12],
                ['name' => 'Electrical', 'icon' => '⚡', 'count' => 8],
                ['name' => 'Emergency', 'icon' => '🚨', 'count' => 10],
                ['name' => 'Fire Officer', 'icon' => '🛡️', 'count' => 6],
                ['name' => 'Workplace', 'icon' => '🏢', 'count' => 9],
            ];
            @endphp
            @foreach($cats as $cat)
            <div class="card text-center hover:scale-105 cursor-pointer">
                <div class="text-4xl mb-3">{{ $cat['icon'] }}</div>
                <h4 class="text-white font-medium text-sm">{{ $cat['name'] }}</h4>
                <p class="text-text-muted text-xs mt-1">{{ $cat['count'] }} Courses</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Expert Trainers --}}
<section class="section-padding">
    <div class="container-custom mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Expert <span class="gradient-text">Trainers</span></h2>
            <p class="text-text-muted max-w-2xl mx-auto">Learn from experienced fire safety professionals and industry veterans.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
            $trainers = [
                ['name' => 'Capt. Rajesh Singh', 'role' => 'Fire Safety Expert', 'exp' => '20+ years'],
                ['name' => 'Dr. Priya Mehta', 'role' => 'Industrial Safety', 'exp' => '15+ years'],
                ['name' => 'Suresh Kumar', 'role' => 'Emergency Response', 'exp' => '18+ years'],
                ['name' => 'Anita Sharma', 'role' => 'Electrical Safety', 'exp' => '12+ years'],
            ];
            @endphp
            @foreach($trainers as $trainer)
            <div class="card text-center group">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-secondary to-accent flex items-center justify-center">
                    <span class="text-2xl font-bold text-white">{{ substr($trainer['name'], 0, 1) }}</span>
                </div>
                <h4 class="text-white font-semibold group-hover:text-secondary transition-colors">{{ $trainer['name'] }}</h4>
                <p class="text-secondary text-sm mt-1">{{ $trainer['role'] }}</p>
                <p class="text-text-muted text-xs mt-1">{{ $trainer['exp'] }} experience</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="section-padding bg-card/30">
    <div class="container-custom mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">What Our <span class="gradient-text">Students Say</span></h2>
            <p class="text-text-muted max-w-2xl mx-auto">Hear from professionals who transformed their careers with Fire Academy.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($testimonials ?? [] as $testimonial)
            <div class="card">
                <div class="flex items-center mb-4">
                    @for($s = 0; $s < ($testimonial->rating ?? 5); $s++)
                    <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-text-muted text-sm leading-relaxed mb-4">"{{ $testimonial->content }}"</p>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-secondary/20 flex items-center justify-center">
                        <span class="text-secondary font-bold text-sm">{{ substr($testimonial->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="text-white text-sm font-medium">{{ $testimonial->name }}</p>
                        <p class="text-text-muted text-xs">{{ $testimonial->designation }}</p>
                    </div>
                </div>
            </div>
            @empty
            @php
            $defaultTestimonials = [
                ['name' => 'Rajesh Kumar', 'role' => 'Fire Safety Officer', 'content' => 'Fire Academy transformed my understanding of fire safety. The AI tutor helped me prepare for my certification.'],
                ['name' => 'Priya Sharma', 'role' => 'Safety Engineer', 'content' => 'The practical approach to industrial safety training is unmatched. Completed my certification in just 3 months.'],
                ['name' => 'Amit Patel', 'role' => 'Station Officer', 'content' => 'Highly recommend Fire Academy for all fire service professionals. Content is up-to-date and certificate is recognized.'],
            ];
            @endphp
            @foreach($defaultTestimonials as $t)
            <div class="card">
                <div class="flex items-center mb-4">
                    @for($s = 0; $s < 5; $s++)
                    <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-text-muted text-sm leading-relaxed mb-4">"{{ $t['content'] }}"</p>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-secondary/20 flex items-center justify-center">
                        <span class="text-secondary font-bold text-sm">{{ substr($t['name'], 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="text-white text-sm font-medium">{{ $t['name'] }}</p>
                        <p class="text-text-muted text-xs">{{ $t['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- AI Assistant Preview --}}
<section class="section-padding">
    <div class="container-custom mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-accent/10 border border-accent/20">
                    <span class="text-accent text-sm font-medium">AI-Powered Learning</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold">Meet <span class="gradient-text">Fire AI</span></h2>
                <p class="text-text-muted leading-relaxed">Your intelligent tutoring companion that provides instant answers to fire safety questions, generates mock tests, and guides you through emergency procedures.</p>
                <ul class="space-y-3">
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text-muted">Fire Safety Q&A</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text-muted">Mock Test Generation</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text-muted">Emergency Procedure Guides</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text-muted">Course Recommendations</span>
                    </li>
                </ul>
                <a href="{{ route('register') }}" class="btn-primary inline-block">Try Fire AI Free</a>
            </div>
            <div class="card p-0 overflow-hidden">
                <div class="bg-primary/50 px-6 py-4 border-b border-white/5 flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-secondary to-accent flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <span class="text-white font-medium">Fire AI Assistant</span>
                    <span class="ml-auto px-2 py-0.5 bg-green-500/20 text-green-400 text-xs rounded-full">Online</span>
                </div>
                <div class="p-6 space-y-4 min-h-[300px]">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center shrink-0">
                            <span class="text-secondary text-xs font-bold">AI</span>
                        </div>
                        <div class="bg-white/5 rounded-lg rounded-tl-none p-3 max-w-[80%]">
                            <p class="text-text-muted text-sm">Hello! I'm Fire AI. How can I help you with fire safety today?</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 justify-end">
                        <div class="bg-secondary/20 rounded-lg rounded-tr-none p-3 max-w-[80%]">
                            <p class="text-white text-sm">What are the classes of fire extinguishers?</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 rounded-full bg-secondary/20 flex items-center justify-center shrink-0">
                            <span class="text-secondary text-xs font-bold">AI</span>
                        </div>
                        <div class="bg-white/5 rounded-lg rounded-tl-none p-3 max-w-[80%]">
                            <p class="text-text-muted text-sm">Fire extinguishers are classified by the type of fire they combat:<br><strong class="text-white">Class A:</strong> Ordinary combustibles<br><strong class="text-white">Class B:</strong> Flammable liquids<br><strong class="text-white">Class C:</strong> Electrical fires<br><strong class="text-white">Class D:</strong> Metal fires<br><strong class="text-white">Class K:</strong> Kitchen fires</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="section-padding">
    <div class="container-custom mx-auto">
        <div class="relative rounded-3xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-secondary to-accent opacity-90"></div>
            <div class="relative px-8 py-16 md:px-16 md:py-20 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Start Your Safety Journey?</h2>
                <p class="text-white/80 text-lg max-w-2xl mx-auto mb-8">Join thousands of professionals who have advanced their careers with Fire Academy's certified training programs.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-white text-primary px-8 py-4 rounded-lg font-bold text-lg hover:bg-white/90 transition-all">
                        Enroll Now - It's Free
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white/10 transition-all">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
