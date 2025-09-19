<?php
namespace Modules\CMS\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\CMS\Models\Blog;
use Modules\CMS\Models\BlogTranslation;
use Modules\CMS\Models\BlogCategory; // <- use this
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        
        return view('cms::blogs.index');
    }

    public function create()
    {
        // Fetch categories for dynamic display
        $categories = BlogCategory::all(); // <- use BlogCategory here

        return view('cms::blogs.create', compact('categories'));
    }

    public function edit(Blog $blog)
    {
        return view('cms::blogs.edit', compact('blog'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'content.en' => 'required|string',
            'status' => 'required|in:draft,published',
            'category_ids' => 'array',
            'new_category' => 'nullable|string|max:255',
            'excerpt.en' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string'
        ]);

        // Create blog
        $blog = Blog::create([
            'status' => $request->status
        ]);

        // Handle translations
        foreach (['en', 'ur', 'ar'] as $locale) {
            $blog->translations()->create([
                'locale' => $locale,
                'title' => $request->title[$locale] ?? null,
                'content' => $request->content[$locale] ?? null,
                'excerpt' => $request->excerpt[$locale] ?? null,
            ]);
        }

        // Handle categories
        $categoryIds = $request->category_ids ?? [];

        // Create new category if provided
        if ($request->new_category) {
            $newCat = BlogCategory::create(['name' => $request->new_category]); // <- use BlogCategory
            $categoryIds[] = $newCat->id;
        }

        $blog->categories()->sync($categoryIds);

        // Handle featured image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $blog->image = $path;
            $blog->save();
        }

        return redirect()->route('cms.blogs.index')->with('message', 'Blog created successfully.');
    }

    public function destroy(Blog $blog)
    {
        

        // Detach categories
        $blog->categories()->detach();

        // Delete image if exists
        if ($blog->image && \Storage::disk('public')->exists($blog->image)) {
            \Storage::disk('public')->delete($blog->image);
        }

        // Delete the blog itself
        $blog->delete();

        return redirect()->route('cms.blogs.index')->with('message', 'Blog deleted successfully.');
    }

}
