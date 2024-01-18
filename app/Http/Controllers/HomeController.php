<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\HasDate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the home page.
     *
     * @return View
     */
    public function index(): View
    {
        # Get all posts from the database
        $posts = Post::withCount('comments')->paginate(5);

        # Get recent posts
        $recent_posts = Post::latest()->take(3)->get();

        # Get categories with posts counter
        $categories = Category::withCount('posts')->take(10)->orderBy('posts_count', 'desc')->get();

        # Get Tags with posts counter
        $tags = Tag::withCount('posts')->take(10)->orderBy('posts_count', 'desc')->get();

        return view('home', compact('posts', 'recent_posts', 'categories', 'tags'));
    }

    /**
     * Show the post.
     *
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        # Get Post with comments
        $post = Post::with('comments')->findOrFail('slug', $post);

        # Get recent posts
        $recent_posts = Post::latest()->take(3)->get();

        # Get categories with posts counter
        $categories = Category::withCount('posts')->take(10)->orderBy('posts_count', 'desc')->get();

        # Get Tags with posts counter
        $tags = Tag::withCount('posts')->take(10)->orderBy('posts_count', 'desc')->get();

        return view('post', compact('post', 'recent_posts', 'categories', 'tags'));
    }
}
