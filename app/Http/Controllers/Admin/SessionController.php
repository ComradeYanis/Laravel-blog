<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Response;

/**
 * Class SessionController
 * @package App\Http\Controllers\Admin
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
        $sessions = Session::paginate(10);

        return view('admin.sessions.index', compact('sessions'));
    }
}
