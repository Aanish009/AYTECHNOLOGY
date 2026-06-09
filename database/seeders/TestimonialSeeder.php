<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Rajesh Kumar',
                'designation' => 'Fire Safety Officer',
                'company' => 'Tata Steel',
                'content' => 'Fire Academy transformed my understanding of fire safety. The courses are well-structured and the AI tutor helped me prepare for my certification exam.',
                'rating' => 5,
                'is_featured' => true,
            ],
            [
                'name' => 'Priya Sharma',
                'designation' => 'Safety Engineer',
                'company' => 'Reliance Industries',
                'content' => 'The practical approach to industrial safety training is unmatched. I completed my certification in just 3 months with excellent scores.',
                'rating' => 5,
                'is_featured' => true,
            ],
            [
                'name' => 'Amit Patel',
                'designation' => 'Station Officer',
                'company' => 'Gujarat Fire Service',
                'content' => 'Highly recommend Fire Academy for all fire service professionals. The content is up-to-date and the certificate is recognized nationwide.',
                'rating' => 5,
                'is_featured' => true,
            ],
        ];

        foreach ($testimonials as $i => $testimonial) {
            Testimonial::firstOrCreate(
                ['name' => $testimonial['name']],
                array_merge($testimonial, ['sort_order' => $i, 'is_active' => true])
            );
        }
    }
}
