<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create() {

    }

    public function show($id) {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    public function update() {

    }

    public function delete(){

    }

}
