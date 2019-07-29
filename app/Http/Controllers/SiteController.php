<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Rules\CommentAuthorRule;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{

    /**
     * Home/Main page
     * @return Factory|View
     */
    public function index()
    {
        $posts      = Post::paginate(10);
        $categories = Category::all()->take(6);

        return view('frontend.index', get_defined_vars());
    }

    /**
     * @param Post $post
     * @return Factory|View
     */
    public function post(Post $post)
    {
        $post = $post->load(['comments', 'category']);
        $categories = Category::all()->take(6);
        return view('frontend.post', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function comment(Request $request, Post $post)
    {
        $this->validate($request, [
            'author' => ['required', new CommentAuthorRule()],
            'content' => 'required'
        ]);

        $post->comments()->create([
            'author'    => $request->author,
            'content'   => ucwords($request->content),
            'type'      => Comment::TYPE_POST_COMMENT,
            'data_id'   => $post->id
        ]);

//        flash()->overlay('Comment succesfully created');

        return redirect("posts/{$post->id}");
    }
}
