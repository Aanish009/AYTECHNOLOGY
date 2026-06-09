<footer class="bg-card border-t border-white/5">
    <div class="container-custom mx-auto section-padding">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            {{-- Brand --}}
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-secondary to-accent rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white">Fire<span class="text-secondary">Academy</span></span>
                </a>
                <p class="text-text-muted text-sm leading-relaxed">
                    India's premier platform for fire safety and industrial safety training.
                    Learn from experts, get certified, save lives.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-text-muted hover:text-secondary transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="text-text-muted hover:text-secondary transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <a href="#" class="text-text-muted hover:text-secondary transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('courses.index') }}" class="text-text-muted hover:text-secondary text-sm transition-colors">All Courses</a></li>
                    <li><a href="{{ route('about') }}" class="text-text-muted hover:text-secondary text-sm transition-colors">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-text-muted hover:text-secondary text-sm transition-colors">Contact Us</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-text-muted hover:text-secondary text-sm transition-colors">Blog</a></li>
                    <li><a href="{{ route('faq') }}" class="text-text-muted hover:text-secondary text-sm transition-colors">FAQ</a></li>
                </ul>
            </div>

            {{-- Categories --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Categories</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-text-muted hover:text-secondary text-sm transition-colors">Fire Safety</a></li>
                    <li><a href="#" class="text-text-muted hover:text-secondary text-sm transition-colors">Industrial Safety</a></li>
                    <li><a href="#" class="text-text-muted hover:text-secondary text-sm transition-colors">Electrical Safety</a></li>
                    <li><a href="#" class="text-text-muted hover:text-secondary text-sm transition-colors">Emergency Response</a></li>
                    <li><a href="#" class="text-text-muted hover:text-secondary text-sm transition-colors">Fire Officer Training</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-3">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-secondary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="text-text-muted text-sm">Vadodara, Gujarat, India</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-secondary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="text-text-muted text-sm">info@fireacademy.in</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-secondary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="text-text-muted text-sm">+91-9106330166</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="mt-12 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <p class="text-text-muted text-sm">&copy; {{ date('Y') }} Fire Academy. All rights reserved.</p>
            <div class="flex space-x-6">
                <a href="{{ route('privacy') }}" class="text-text-muted hover:text-secondary text-sm transition-colors">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="text-text-muted hover:text-secondary text-sm transition-colors">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>
