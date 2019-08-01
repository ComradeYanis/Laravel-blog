<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Response;

/**
 * Class CommentController
 * @package App\Http\Controllers\Admin
 */
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comments = Comment::with('data')->paginate(10);

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return Response
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        flash()->overlay('Comment deleted successfully.');

        return redirect('/admin/comments');
    }
}
