<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Post::with('category')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->latest('published_at');

            if ($request->has('category') && $request->category) {
                $categorySlug = filter_var($request->category, FILTER_SANITIZE_STRING);
                $query->whereHas('category', function($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
            }

            $posts = $query->paginate(9);
            $categories = Category::withCount(['posts' => function($q) {
                $q->whereNotNull('published_at')->where('published_at', '<=', now());
            }])->get();

            return view('blog.index', compact('posts', 'categories'));
        } catch (\Exception $e) {
            \Log::error("Blog Index Error: " . $e->getMessage());
            abort(500, "Something went wrong while fetching the blog posts.");
        }
    }

    public function show($slug)
    {
        try {
            $post = Post::with('category')
                ->where('slug', $slug)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->firstOrFail();
                
            return view('blog.show', compact('post'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, "The blog post you are looking for does not exist.");
        } catch (\Exception $e) {
            \Log::error("Blog Show Error: " . $e->getMessage());
            abort(500, "An error occurred while loading the post.");
        }
    }
}
