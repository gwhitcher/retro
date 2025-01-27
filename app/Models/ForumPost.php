<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumPost extends Model {
    public static function getSingle($id) {
        return DB::table('forum_post')
            ->where('id', $id)
            ->first();
    }

    public static function getAll($order = 'desc') {
        return DB::table('forum_post')
            ->orderBy('id', $order)
            ->get();
    }

    public static function getAllByTopicID($topic_id, $order = 'desc') {
        return DB::table('forum_post')
            ->where('topic_id', $topic_id)
            ->orderBy('id', $order)
            ->get();
    }

    public static function add(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        return DB::table('forum_post')
            ->insert([
                'title' => $title,
                'content' => $content,
            ]);
    }

    public static function edit($id, Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        return DB::table('forum_post')
            ->where('id', $id)
            ->update([
                'title' => $title,
                'content' => $content,
            ]);
    }

    public static function remove($id) {
        return DB::table('forum_post')
            ->where('id', $id)
            ->delete();
    }
}
