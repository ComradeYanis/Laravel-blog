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
        $categories = Category::all();

        return view('frontend.index', compact('posts', 'categories'));
    }

    /**
     * @param Post $post
     * @return Factory|View
     */
    public function post(Post $post)
    {
        $post = $post->load(['comments', 'category']);
        $categories = Category::all();
        $selected_category = $post->category->load(['comments']);

        return view('frontend.post', get_defined_vars());
    }

    /**
     * @param Category $category
     * @return Factory|View
     */
    public function category(Category $category)
    {
        $posts =  $category->hasMany(Post::class)->paginate(10);
        $categories = Category::all();
        $selected_category = $category->load(['comments']);

        return view('frontend.index', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function commentPost(Request $request, Post $post)
    {
        $this->validate($request, [
            'author' => ['required', new CommentAuthorRule()],
            'content' => 'required'
        ]);

        $post->comments()->create([
            'author'    => ucwords($request->author),
            'content'   => $request->content,
            'type'      => Comment::TYPE_POST_COMMENT,
            'data_id'   => $post->id
        ]);

//        flash()->overlay('Comment succesfully created');

        return redirect("posts/{$post->id}");
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function commentCategory(Request $request, Category $category)
    {
        $this->validate($request, [
            'author' => ['required', new CommentAuthorRule()],
            'content' => 'required'
        ]);

        $category->comments()->create([
            'author'    => ucwords($request->author),
            'content'   => $request->content,
            'type'      => Comment::TYPE_CATEGORY_COMMENT,
            'data_id'   => $category->id
        ]);

//        flash()->overlay('Comment succesfully created');

        return redirect("categories/{$category->id}");
    }
}
