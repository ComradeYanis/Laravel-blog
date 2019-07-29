<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class CommentController
 * @package App\Http\Controllers\Backend
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
        $comments = Comment::with(['posts', 'categories'])->paginate(10);
        return view('backend.comments.index', compact('comments'));
    }
}