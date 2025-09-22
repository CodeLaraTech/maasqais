<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\CMS\Models\Page;
use Modules\CMS\Models\Testimonial;
use Modules\LMS\Models\Course;
use Modules\CMS\Models\Blog;
use Modules\CMS\Models\BlogCategory;
use Modules\CMS\Models\Banner; // 🔹 Add Banner
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function showPage($slug = null)
    {
        $slug = $slug ? trim($slug, '/') : 'home';

        $page = Page::with('parent')
            ->where('status', 'published')
            ->get()
            ->first(fn($page) => $page->full_slug === $slug);

        abort_unless($page, 404);

        $template = $page->template_name ?: 'frontend.page';
        if (!view()->exists($template)) {
            $template = 'frontend.page';
        }

        // Initialize as empty collections
        $testimonials = collect();
        $courses = collect();
        $stories = collect();
        $blogs = collect();
        $banners = collect(); // 🔹 Add banners

        // Load banners only for homepage (or by slug)
        if ($slug === 'home') {
            $banners = Banner::with('items')
                ->where('status', 1)                     // only active banners
                ->where('slug', 'home-page-slideshow')  // fetch banner by slug
                ->first();                               // get a single banner
        }


        // Load testimonials only for specific pages
        if (in_array($slug, ['home', 'about-us', 'testimonials'])) {
            $testimonials = Testimonial::where('status', 1)
                ->orderBy('sort_order', 'asc')
                ->get();
        }

        // Load courses only for specific pages
        if (Str::endsWith($slug, ['courses-offered', 'training-programs'])) {
            $courses = Course::where('status', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        }

        // Home page logic
        if ($slug === 'home') {
            // 🔹 Success Stories
            $successCategory = BlogCategory::where('slug', 'success-stories')->first();
            $stories = $successCategory
                ? $successCategory->blogs()->where('status', 'published')->orderBy('created_at', 'desc')->get()
                : collect();

            // 🔹 Other Blogs (exclude Success Stories)
            $blogs = Blog::with('categories') // eager load categories
                ->where('status', 'published')
                ->whereDoesntHave('categories', function ($q) use ($successCategory) {
                    if ($successCategory) {
                        $q->where('cms_blog_categories.id', $successCategory->id);
                    }
                })
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            $blogs = Blog::with('categories') // eager load categories for other pages too
                ->where('status', 'published')
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }


        return view($template, [
            'page' => $page,
            'testimonials' => $testimonials,
            'courses' => $courses,
            'stories' => $stories, // Only for Home page
            'blogs' => $blogs,
            'banners' => $banners, // 🔹 Pass banners to view
        ]);
    }
}
