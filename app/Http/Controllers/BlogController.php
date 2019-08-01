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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $posts = Post::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            return $query->where('name', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%");
        })->with('category')
            ->withCount('comments')
            ->simplePaginate(5);

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
        $posts = Post::where(['category_id' => $category->id])->paginate(5);
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

        flash()->overlay('Comment successfully created');

        return redirect("/posts/{$post->id}");
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

        flash()->overlay('Comment succesfully created');

        return Redirect::back();
    }
}
