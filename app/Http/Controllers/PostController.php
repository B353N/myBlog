<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Show the post.
     *
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        # Get post comments
        $comments = $post->comments()->with('user')->get();

        # Get recent posts
        $recent_posts = Post::latest()->take(3)->get();

        # Get categories with posts counter
        $categories = Category::withCount('posts')->take(10)->orderBy('posts_count', 'desc')->get();

        # Get Tags with posts counter
        $tags = Tag::withCount('posts')->take(10)->orderBy('posts_count', 'desc')->get();

        return view('post', compact('post', 'recent_posts', 'categories', 'tags', 'comments'));
    }
}
