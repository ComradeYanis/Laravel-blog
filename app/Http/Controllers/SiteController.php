<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
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
        $posts      = Post::all();
        $categories = Category::all();

        return view('frontend.site.index', get_defined_vars());
    }

    /**
     * @param Post $post
     * @return Factory|View
     */
    public function post(Post $post)
    {
        $post = $post->load(['comments', 'category']);

        return view('frontend.post', compact('post'));
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function comment(Request $request, Post $post)
    {
        $this->validate($request, [['author', 'content'] => 'required']);

        $post->comments()->create([
            'author'    => $request->author,
            'content'   => $request->content,
        ]);

        flash()->overlay('Comment succesfully created');

        return redirect("posts/{$post->id}");
    }
}
