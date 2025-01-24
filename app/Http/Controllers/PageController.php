<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
        ->except(['view']);
    }

    public function view($slug = null) {
        if(empty($slug)) {
            $slug = 'home';
        }
        $page = Page::getSingleBySlug($slug);
        if (!$page) {
            abort(404);
        } else {
            return view('page.view')
                ->with('page', $page);
        }
    }
}
