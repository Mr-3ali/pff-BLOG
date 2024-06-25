<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index(Request $request)
    {
        // Fetch comments with search functionality
        $search = $request->input('search');
        $comments = Comment::with('post')
            ->when($search, function($query, $search) {
                $query->where('content', 'like', "%{$search}%")
                      ->orWhereHas('post', function($q) use ($search) {
                          $q->where('title', 'like', "%{$search}%");
                      });
            })
            ->paginate(10);

        return view('admin.comments.index', compact('comments', 'search'));
    }

    public function destroy(Comment $comment)
    {
        // Delete the comment
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comment deleted successfully.');
    }
}