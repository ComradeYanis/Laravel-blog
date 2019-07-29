<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SessionController
 * @package App\Http\Controllers\Backend
 */
class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sessions = Session::with()->paginate(10);
        return view('backend.sessions.index', compact('sessions'));
    }
}
