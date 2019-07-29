<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
    public function index() {

        return view('site.index');
    }
}
