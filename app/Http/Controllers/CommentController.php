<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
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
            $comment->commentable_id = $post->id;
            $comment->commentable_type = 'App\Models\Post';
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
     * Reply on comment
     *
     * @param Comment $comment
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeReply(Comment $comment, Request $request): \Illuminate\Http\RedirectResponse
    {

        # Get Comment
        $parentComment = Comment::findOrFail($comment->id);

        $request->validate([
            'comment' => 'required'
        ]);

        # Handle respond messages
        $res = [];

        try {
            # Begin Transaction
            DB::beginTransaction();

            # Create a new comment
            $comment = new Comment();
            $comment->the_comment = $request->comment;
            $comment->user_id = auth()->id();
            $comment->commentable_id = $parentComment->commentable_id;
            $comment->parent_id = $parentComment->id;
            $comment->commentable_type = 'App\Models\Post';
            $comment->save();

            # Commit Transaction
            DB::commit();

            # Prepare the success message
            $res['message'] = 'Comment added successfully!';

            # Return the success message
            return redirect('post/' . $parentComment->post->slug.'#comment_' . $comment->id)->with('success', $res['message']);

        } catch (\Exception $e) {
            # Rollback Transaction
            DB::rollBack();

            # Prepare the error message
            $res['message'] = $e->getMessage();

            # Return the error message
            return redirect('post/' . $parentComment->slug.'#comment_' . $comment->id)->withErrors($res['message']);
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

        # Check if the user is authorized to delete the comment
        if (auth()->user()->role->name !== 'admin' || auth()->user()->id !== $comment->user_id) {
            # Prepare the error message
            $res['message'] = 'You are not authorized to delete this comment!';

            # Return the error message
            return redirect()->back()->withErrors($res['message']);
        }

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
