<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAdmin extends Model {

    public static function getSingle($value, $column = 'id') {
        return DB::table('users')
            ->where($column, '=', $value)
            ->first();
    }

    public static function getAll() {
        return DB::table('users')
            ->orderBy('id', 'desc')
            ->get();
    }

    public static function add(Request $request) {
        $name = $request->input('name');
        $password = Hash::make($request->input('password'));
        $email = $request->input('email');
        $now = now();
        return DB::table('users')
            ->insert(
                [
                    'name' => $name,
                    'password' => $password,
                    'email' => $email,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
    }

    public static function edit($id, Request $request) {
        $name = $request->input('name');
        $password = Hash::make($request->input('password'));
        $email = $request->input('email');
        $now = now();
        if(!empty($password)) {
            return DB::table('users')
                ->where('id', '=', $id)
                ->update(
                    [
                        'name' => $name,
                        'password' => $password,
                        'email' => $email,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
        } else {
            return DB::table('users')
                ->where('id', '=', $id)
                ->update(
                    [
                        'name' => $name,
                        'email' => $email,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
        }

    }

    public static function remove($id) {
        return DB::table('users')
            ->where('id', $id)
            ->delete();
    }
}
