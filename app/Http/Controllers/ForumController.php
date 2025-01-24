<?php

namespace App\Http\Controllers;

use App\Models\Page;

class ForumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
        ->except(['index']);
    }

    public function index()
    {
        return view('forum.index');
    }
}
