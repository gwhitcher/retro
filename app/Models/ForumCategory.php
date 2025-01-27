<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumCategory extends Model {
    public static function getSingle($id) {
        return DB::table('forum_category')
            ->where('id', $id)
            ->first();
    }

    public static function getAll($order = 'desc') {
        return DB::table('forum_category')
            ->orderBy('id', $order)
            ->get();
    }

    public static function getAllByForumID($forum_id, $order = 'desc') {
        return DB::table('forum_category')
            ->where('forum_id', $forum_id)
            ->orderBy('id', $order)
            ->get();
    }

    public static function add(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        return DB::table('forum_category')
            ->insert([
                'title' => $title,
                'content' => $content,
            ]);
    }

    public static function edit($id, Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        return DB::table('forum_category')
            ->where('id', $id)
            ->update([
                'title' => $title,
                'content' => $content,
            ]);
    }

    public static function remove($id) {
        return DB::table('forum_topic')
            ->where('id', $id)
            ->delete();
    }
}
