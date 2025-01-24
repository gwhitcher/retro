<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->except(['home']);
    }

    public function index()
    {
        $user = auth()->user();
        return view('profile.index')
            ->with('user', $user);
    }
}
