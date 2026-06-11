<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['question' => 'What is Fire Academy?', 'answer' => 'Fire Academy is a comprehensive online learning platform dedicated to fire safety, industrial safety, and emergency response training. We offer certified courses designed for fire officers, safety engineers, and corporate professionals.', 'category' => 'general'],
            ['question' => 'How do I enroll in a course?', 'answer' => 'Simply create an account, browse our course catalog, select your desired course, make the payment, and start learning immediately. You can access courses from any device.', 'category' => 'courses'],
            ['question' => 'Are the certificates recognized?', 'answer' => 'Yes, our certificates are industry-recognized and come with QR code verification. Each certificate has a unique ID that can be verified through our portal.', 'category' => 'certificates'],
            ['question' => 'What payment methods are accepted?', 'answer' => 'We accept UPI payments, credit/debit cards, net banking, and digital wallets through our secure Razorpay gateway.', 'category' => 'payments'],
            ['question' => 'Can I access courses on mobile?', 'answer' => 'Yes, Fire Academy is fully responsive and works on all devices. You can also install our PWA for an app-like experience on your mobile device.', 'category' => 'general'],
            ['question' => 'What is Fire AI?', 'answer' => 'Fire AI is our intelligent tutoring system that helps you with fire safety questions, generates mock tests, recommends courses, and provides guidance on emergency procedures.', 'category' => 'ai'],
        ];

        foreach ($faqs as $i => $faq) {
            DB::table('faqs')->updateOrInsert(
                ['question' => $faq['question']],
                array_merge($faq, ['sort_order' => $i, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
