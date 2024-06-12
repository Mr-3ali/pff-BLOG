<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class userCommentcontroller extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate(['content' => 'required']);

        $post->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
