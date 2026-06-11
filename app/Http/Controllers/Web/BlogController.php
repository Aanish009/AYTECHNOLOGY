<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'published')
            ->with('category', 'author')
            ->latest('published_at')
            ->paginate(9);

        $categories = BlogCategory::all();

        return view('web.blog.index', compact('blogs', 'categories'));
    }

    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 'published')
            ->with('category', 'author')
            ->firstOrFail();

        $blog->increment('views_count');

        $relatedBlogs = Blog::where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->where('status', 'published')
            ->limit(3)
            ->get();

        return view('web.blog.show', compact('blog', 'relatedBlogs'));
    }
}
