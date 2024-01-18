<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * Store a comment on post.
     *
     * @param Post $post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Post $post, Request $request): \Illuminate\Http\RedirectResponse
    {
        # Get the post
        $post = Post::findOrFail($post->id);

        $request->validate([
            'comment' => 'required'
        ]);

        # Handle the request
        $res = [];

        try {
            # Begin Transaction
            DB::beginTransaction();

            # Create a new comment
            $comment = new Comment();
            $comment->the_comment = $request->comment;
            $comment->user_id = auth()->id();
            $comment->post_id = $post->id;
            $comment->save();

            # Commit Transaction
            DB::commit();

            # Prepare the success message
            $res['message'] = 'Comment added successfully!';

            # Return the success message
            return redirect('post/' . $post->slug.'#comment_' . $comment->id)->with('success', $res['message']);

        } catch (\Exception $e) {
            # Rollback Transaction
            DB::rollBack();

            # Prepare the error message
            $res['message'] = $e->getMessage();

            # Return the error message
            return redirect('post/' . $post->slug.'#comment_' . $post->id)->withErrors($res['message']);
        }
    }

    /**
     * Delete a comment.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment): \Illuminate\Http\RedirectResponse
    {
        # Handle the request
        $res = [];

        try {
            # Begin Transaction
            DB::beginTransaction();

            # Delete the comment
            $comment->delete();

            # Commit Transaction
            DB::commit();

            # Prepare the success message
            $res['message'] = 'Comment deleted successfully!';

            # Return the success message
            return redirect()->back()->with('success', $res['message']);

        } catch (\Exception $e) {
            # Rollback Transaction
            DB::rollBack();

            # Prepare the error message
            $res['message'] = $e->getMessage();

            # Return the error message
            return redirect()->back()->withErrors($res['message']);
        }
    }
}
