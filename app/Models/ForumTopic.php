<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumTopic extends Model {
    public static function getSingle($id) {
        return DB::table('forum_topic')
            ->where('id', $id)
            ->first();
    }

    public static function getAll($order = 'desc') {
        return DB::table('forum_topic')
            ->orderBy('id', $order)
            ->get();
    }

    public static function getAllByCategoryID($categoryID, $order = 'desc') {
        return DB::table('forum_topic')
            ->where('category_id', $categoryID)
            ->orderBy('id', $order)
            ->get();
    }

    public static function add(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        return DB::table('forum_topic')
            ->insert([
                'title' => $title,
                'content' => $content,
            ]);
    }

    public static function edit($id, Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        return DB::table('forum_topic')
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
