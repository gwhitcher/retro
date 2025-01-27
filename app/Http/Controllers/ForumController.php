<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\ForumCategory;
use App\Models\ForumPost;
use App\Models\ForumTopic;
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
        $forums = Forum::getAll();
        return view('forum.index')
            ->with([
                'forums' => $forums
            ]);
    }

    public function category($id)
    {
        $category = ForumCategory::getSingle($id);
        $topics = ForumTopic::getAllByCategoryID($id);
        return view('forum.category')
            ->with([
                'category' => $category,
                'topics' => $topics
            ]);
    }

    public function topic($id)
    {
        $topic = ForumTopic::getSingle($id);
        $posts = ForumPost::getAllByTopicID($id);
        return view('forum.topic')
            ->with([
                'topic' => $topic,
                'posts' => $posts
            ]);
    }
}
