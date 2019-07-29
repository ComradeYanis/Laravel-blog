<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
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
}
