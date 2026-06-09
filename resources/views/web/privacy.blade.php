@extends('layouts.app')
@section('title', 'Privacy Policy - Fire Academy')

@section('content')
<section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="container-custom mx-auto max-w-4xl prose prose-invert">
        <h1 class="text-4xl font-bold mb-8">Privacy Policy</h1>
        <p class="text-text-muted">Last updated: {{ date('F Y') }}</p>

        <h2 class="text-2xl font-semibold text-white mt-8">1. Information We Collect</h2>
        <p class="text-text-muted">We collect information you provide directly to us, such as when you create an account, enroll in a course, make a payment, or contact us. This includes your name, email address, phone number, educational qualifications, and payment information.</p>

        <h2 class="text-2xl font-semibold text-white mt-8">2. How We Use Your Information</h2>
        <p class="text-text-muted">We use the information we collect to provide, maintain, and improve our services, process transactions, send notifications, and communicate with you about courses and updates.</p>

        <h2 class="text-2xl font-semibold text-white mt-8">3. Data Security</h2>
        <p class="text-text-muted">We implement appropriate technical and organizational measures to protect your personal data against unauthorized access, alteration, disclosure, or destruction.</p>

        <h2 class="text-2xl font-semibold text-white mt-8">4. Cookies</h2>
        <p class="text-text-muted">We use cookies and similar technologies to improve your browsing experience and analyze usage patterns.</p>

        <h2 class="text-2xl font-semibold text-white mt-8">5. Contact Us</h2>
        <p class="text-text-muted">If you have any questions about this Privacy Policy, please contact us at info@fireacademy.in.</p>
    </div>
</section>
@endsection
