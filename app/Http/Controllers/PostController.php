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

    /**
     * Delete the post.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        # Handle the request
        $res = [];

        # Check if the user is authorized to delete the post
        if (auth()->user()->role->name !== 'admin') {
            # Prepare the error message
            $res['message'] = 'You are not authorized to delete this post!';

            # Return the error message
            return redirect('/')->withErrors($res['message']);
        }

        try {
            # Delete the post
            $post->delete();

            # Prepare the success message
            $res['message'] = 'Post deleted successfully!';

            # Return the success message
            return redirect('/')->with('success', $res['message']);

        } catch (\Exception $e) {
            # Prepare the error message
            $res['message'] = $e->getMessage();

            # Return the error message
            return redirect('/')->withErrors($res['message']);
        }
    }
}
