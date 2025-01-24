<?php

namespace App\Http\Controllers;

use App\Models\Page;

class CheatController extends Controller
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

    public function index($slug = null)
    {
        return view('cheat.index');
    }
}
