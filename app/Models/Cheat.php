<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cheat extends Model {

    public static function getSingle($id) {
        return DB::connection('mariadb_cheats')
            ->table('codes')
            ->where('id', $id)
            ->first();
    }

    public static function getAll($order = 'desc') {
        return DB::connection('mariadb_cheats')
            ->table('codes')
            ->orderBy('id', $order)
            ->get();
    }

    public static function add(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        return DB::connection('mariadb_cheats')
            ->table('pages')
            ->insert([
                'title' => $title,
                'content' => $content,
            ]);
    }

    public static function edit($id, Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        return DB::connection('mariadb_cheats')
            ->table('pages')
            ->where('id', $id)
            ->update([
                'title' => $title,
                'content' => $content,
            ]);
    }

    public static function remove($id) {
        return DB::connection('mariadb_cheats')
            ->table('pages')
            ->where('id', $id)
            ->delete();
    }
}
