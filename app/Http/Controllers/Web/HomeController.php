<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::where('status', 'published')
            ->where('is_featured', true)
            ->with('category', 'instructor')
            ->limit(6)
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $testimonials = Testimonial::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        return view('web.home', compact('featuredCourses', 'categories', 'testimonials'));
    }

    public function about()
    {
        return view('web.about');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function faq()
    {
        $faqs = \DB::table('faqs')->where('is_active', true)->orderBy('sort_order')->get();
        return view('web.faq', compact('faqs'));
    }

    public function privacy()
    {
        return view('web.privacy');
    }

    public function terms()
    {
        return view('web.terms');
    }
}
