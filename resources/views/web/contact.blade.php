@extends('layouts.app')
@section('title', 'Contact Us - Fire Academy')

@section('content')
<section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="container-custom mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact <span class="gradient-text">Us</span></h1>
            <p class="text-text-muted text-lg">Have questions? We'd love to hear from you.</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            <div class="card p-8">
                <h3 class="text-xl font-bold text-white mb-6">Send us a Message</h3>
                <form method="POST" action="{{ route('contact') }}" class="space-y-5">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-text-muted mb-2">Name</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white focus:border-secondary focus:ring-1 focus:ring-secondary outline-none" placeholder="Your name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-muted mb-2">Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white focus:border-secondary focus:ring-1 focus:ring-secondary outline-none" placeholder="you@example.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-muted mb-2">Subject</label>
                        <input type="text" name="subject" required class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white focus:border-secondary focus:ring-1 focus:ring-secondary outline-none" placeholder="How can we help?">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-muted mb-2">Message</label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 bg-background border border-white/10 rounded-lg text-white focus:border-secondary focus:ring-1 focus:ring-secondary outline-none resize-none" placeholder="Your message..."></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full text-center">Send Message</button>
                </form>
            </div>

            <div class="space-y-8">
                <div class="card p-6 flex items-start space-x-4">
                    <div class="w-12 h-12 bg-secondary/20 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    </div>
                    <div><h4 class="text-white font-semibold">Address</h4><p class="text-text-muted text-sm mt-1">Vadodara, Gujarat, India - 390020</p></div>
                </div>
                <div class="card p-6 flex items-start space-x-4">
                    <div class="w-12 h-12 bg-secondary/20 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div><h4 class="text-white font-semibold">Email</h4><p class="text-text-muted text-sm mt-1">info@fireacademy.in</p></div>
                </div>
                <div class="card p-6 flex items-start space-x-4">
                    <div class="w-12 h-12 bg-secondary/20 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div><h4 class="text-white font-semibold">Phone</h4><p class="text-text-muted text-sm mt-1">+91-9106330166</p></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
