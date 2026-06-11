@extends('layouts.student-app')
@section('title', '24/7 Support - Fire Academy')
@section('page_title', '24/7 Student Support')

@section('content')
{{-- Support Header --}}
<div class="card mb-6 bg-gradient-to-br from-secondary/20 to-accent/10 !border-secondary/20">
    <div class="text-center py-4">
        <div class="w-16 h-16 mx-auto rounded-full bg-secondary/20 flex items-center justify-center mb-3">
            <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </div>
        <h2 class="text-2xl font-bold text-white mb-2">We're Here to Help!</h2>
        <p class="text-text-muted text-sm max-w-md mx-auto">Get 24/7 support from our team. Whether it's technical issues, course queries, or certification questions — we've got you covered.</p>
    </div>
</div>

{{-- Support Channels --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
    {{-- Live Chat --}}
    <div class="card hover:border-secondary/40 transition-colors">
        <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-xl bg-green-500/20 flex items-center justify-center">
                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold text-sm">Live Chat</h3>
                <p class="text-green-400 text-xs font-medium">Online Now</p>
            </div>
        </div>
        <p class="text-text-muted text-sm mb-3">Chat with our support team in real-time for instant assistance.</p>
        <button class="btn-primary w-full !py-2 text-sm" onclick="alert('Live chat integration coming soon!')">Start Chat</button>
    </div>

    {{-- WhatsApp --}}
    <div class="card hover:border-secondary/40 transition-colors">
        <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-xl bg-green-600/20 flex items-center justify-center">
                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold text-sm">WhatsApp Support</h3>
                <p class="text-text-muted text-xs">Avg response: 5 mins</p>
            </div>
        </div>
        <p class="text-text-muted text-sm mb-3">Message us on WhatsApp for quick help with any queries.</p>
        <a href="https://wa.me/919999999999?text=Hi%20Fire%20Academy!%20I%20need%20help%20with..." target="_blank" class="btn-primary w-full !py-2 text-sm inline-block text-center">Message on WhatsApp</a>
    </div>

    {{-- Email --}}
    <div class="card hover:border-secondary/40 transition-colors">
        <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold text-sm">Email Support</h3>
                <p class="text-text-muted text-xs">Avg response: 2 hrs</p>
            </div>
        </div>
        <p class="text-text-muted text-sm mb-3">Send us a detailed email and we'll get back to you shortly.</p>
        <a href="mailto:support@fireacademy.in" class="btn-secondary w-full !py-2 text-sm inline-block text-center">Send Email</a>
    </div>

    {{-- Phone --}}
    <div class="card hover:border-secondary/40 transition-colors">
        <div class="flex items-center space-x-3 mb-3">
            <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </div>
            <div>
                <h3 class="text-white font-semibold text-sm">Phone Support</h3>
                <p class="text-text-muted text-xs">Mon-Sat: 9AM - 9PM</p>
            </div>
        </div>
        <p class="text-text-muted text-sm mb-3">Call us directly for urgent issues or quick questions.</p>
        <a href="tel:+919999999999" class="btn-secondary w-full !py-2 text-sm inline-block text-center">Call Now</a>
    </div>
</div>

{{-- FAQ Section --}}
<div class="card mb-6">
    <h3 class="text-lg font-semibold text-white mb-4">Frequently Asked Questions</h3>
    <div class="space-y-3">
        @php
        $faqs = [
            ['q' => 'How do I access my course after enrollment?', 'a' => 'Go to My Courses in your dashboard. All enrolled courses with progress tracking will be available there.'],
            ['q' => 'Can I download course materials?', 'a' => 'Yes! Navigate to Notes & Materials section to download all available PDFs and study notes.'],
            ['q' => 'How do I get my certificate?', 'a' => 'Complete 100% of the course lessons and pass the final exam. Your certificate will be auto-generated.'],
            ['q' => 'I forgot my password. What should I do?', 'a' => 'Use the Forgot Password link on the login page. We\'ll send a reset link to your registered email.'],
            ['q' => 'How do referral rewards work?', 'a' => 'Share your referral code. When your friend enrolls using your code, you both earn Fire Coins and discounts.'],
        ];
        @endphp
        @foreach($faqs as $faq)
        <div x-data="{ open: false }" class="border border-white/5 rounded-lg overflow-hidden">
            <button @click="open = !open" class="w-full flex items-center justify-between p-3 hover:bg-white/5 transition-colors text-left">
                <span class="text-white text-sm font-medium">{{ $faq['q'] }}</span>
                <svg class="w-4 h-4 text-text-muted transition-transform shrink-0 ml-2" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-transition class="px-3 pb-3 text-text-muted text-sm">{{ $faq['a'] }}</div>
        </div>
        @endforeach
    </div>
</div>

{{-- Submit Ticket --}}
<div class="card">
    <h3 class="text-lg font-semibold text-white mb-4">Submit a Support Ticket</h3>
    <form class="space-y-4">
        @csrf
        <div>
            <label class="text-text-muted text-sm mb-1 block">Subject</label>
            <input type="text" placeholder="Brief description of your issue" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-white text-sm placeholder-text-muted focus:outline-none focus:border-secondary/50 transition-colors">
        </div>
        <div>
            <label class="text-text-muted text-sm mb-1 block">Category</label>
            <select class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-white text-sm focus:outline-none focus:border-secondary/50 transition-colors">
                <option value="">Select category</option>
                <option value="technical">Technical Issue</option>
                <option value="course">Course Related</option>
                <option value="payment">Payment & Billing</option>
                <option value="certificate">Certificate Issue</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div>
            <label class="text-text-muted text-sm mb-1 block">Message</label>
            <textarea rows="4" placeholder="Describe your issue in detail..." class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-white text-sm placeholder-text-muted focus:outline-none focus:border-secondary/50 transition-colors resize-none"></textarea>
        </div>
        <button type="button" class="btn-primary w-full" onclick="alert('Support ticket system coming in next phase!')">Submit Ticket</button>
    </form>
</div>
@endsection
