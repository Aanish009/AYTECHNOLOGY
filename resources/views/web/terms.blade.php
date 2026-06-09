@extends('layouts.app')
@section('title', 'Terms & Conditions - Fire Academy')

@section('content')
<section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="container-custom mx-auto max-w-4xl prose prose-invert">
        <h1 class="text-4xl font-bold mb-8">Terms & Conditions</h1>
        <p class="text-text-muted">Last updated: {{ date('F Y') }}</p>

        <h2 class="text-2xl font-semibold text-white mt-8">1. Acceptance of Terms</h2>
        <p class="text-text-muted">By accessing and using Fire Academy, you agree to be bound by these Terms & Conditions.</p>

        <h2 class="text-2xl font-semibold text-white mt-8">2. User Accounts</h2>
        <p class="text-text-muted">You are responsible for maintaining the confidentiality of your account credentials and for all activities under your account.</p>

        <h2 class="text-2xl font-semibold text-white mt-8">3. Course Enrollment</h2>
        <p class="text-text-muted">Upon payment, you are granted access to the course content for the duration of your subscription. Course access is non-transferable.</p>

        <h2 class="text-2xl font-semibold text-white mt-8">4. Certificates</h2>
        <p class="text-text-muted">Certificates are issued upon successful completion of course requirements. Misuse of certificates may result in revocation.</p>

        <h2 class="text-2xl font-semibold text-white mt-8">5. Refund Policy</h2>
        <p class="text-text-muted">Refund requests must be made within 7 days of purchase. Courses accessed beyond 25% are not eligible for refund.</p>

        <h2 class="text-2xl font-semibold text-white mt-8">6. Contact</h2>
        <p class="text-text-muted">For queries regarding these terms, email us at info@fireacademy.in.</p>
    </div>
</section>
@endsection
