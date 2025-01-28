<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Cheat extends Model {

    public static function getSystems() {
        return DB::connection('mariadb_cheats')
            ->table('systems')
            ->get();
    }

    public static function getSystem($id) {
        return DB::connection('mariadb_cheats')
            ->table('systems')
            ->where('id', $id)
            ->first();
    }

    public static function getGames($order = 'name', $direction = 'asc') {
        return DB::connection('mariadb_cheats')
            ->table('games')
            ->orderBy($order, $direction)
            ->get();
    }

    public static function getGamesBySystemID($id, $order = 'name', $direction = 'asc') {
        return DB::connection('mariadb_cheats')
            ->table('games')
            ->where('system_id', $id)
            ->orderBy($order, $direction)
            ->get();
    }

    public static function getGamesPaginated($count = 25, $order = 'name', $direction = 'asc') {
        return DB::connection('mariadb_cheats')
            ->table('games')
            ->orderBy($order, $direction)
            ->paginate($count);
    }

    public static function getGame($id) {
        return DB::connection('mariadb_cheats')
            ->table('games')
            ->where('id', $id)
            ->first();
    }

    public static function getDevice($id) {
        return DB::connection('mariadb_cheats')
            ->table('devices')
            ->where('id', $id)
            ->first();
    }

    public static function getDevices($order = 'name', $direction = 'asc') {
        return DB::connection('mariadb_cheats')
            ->table('devices')
            ->orderBy($order, $direction)
            ->get();
    }

    public static function getCodes($order = 'name', $direction = 'asc') {
        return DB::connection('mariadb_cheats')
            ->table('codes')
            ->orderBy($order, $direction)
            ->get();
    }

    public static function getCodesPaginated($count = 25, $order = 'name', $direction = 'asc') {
        return DB::connection('mariadb_cheats')
            ->table('codes')
            ->orderBy($order, $direction)
            ->paginate($count);
    }

    public static function getCodesByGameID($id, $order = 'name', $direction = 'asc') {
        return DB::connection('mariadb_cheats')
            ->table('codes')
            ->where('game_id', $id)
            ->orderBy($order, $direction)
            ->get();
    }

    public static function getCode($id) {
        return DB::connection('mariadb_cheats')
            ->table('codes')
            ->where('id', $id)
            ->first();
    }

    public static function saveCheatFile(Request $request) {
        $type = $request->input('type');
        $cheats = $request->input('cheat');

        if(!empty($cheats) && is_array($cheats) && !empty($type) && $type == 'txt') {
            $data = '';
            foreach($cheats as $cheat) {
                $cheat = Cheat::getCode($cheat);
                $code = str_replace('\n', '', $cheat->code);
                $data .= $code.' '.$cheat->name.chr(10);
            }
            Storage::disk('public')->put('cheats/cheats.txt', $data);
            return true;
        }
        elseif(!empty($cheats) && is_array($cheats) && !empty($type) && $type == 'json') {
            $data = ['Cheats'];
            foreach($cheats as $cheat) {
                $cheat = Cheat::getCode($cheat);
                $device = Cheat::getDevice($cheat->device_id);
                $data[] = [
                    'Description' => $cheat->name,
                    'Type' => $device->name,
                    'Enabled' => false,
                    'Codes' => $cheat->code
                ];
            }
            Storage::disk('public')->put('cheats/cheats.json', json_encode($data));
            return true;
        }
        elseif(!empty($cheats) && is_array($cheats) && !empty($type) && $type == 'cht') {
            $data = '';
            foreach($cheats as $cheat) {
                $cheat = Cheat::getCode($cheat);
                $code = str_replace('\n', '', $cheat->code);
                $data
                    .= 'cheat'
                    .chr(10)
                    .'  name: '.$cheat->name.chr(10)
                    .'  code: '.$code.chr(10)
                    .chr(10);
            }
            Storage::disk('public')->put('cheats/cheats.cht', $data);
            return true;
        }
        elseif(!empty($cheats) && is_array($cheats) && !empty($type) && $type == 'cht_ra') {
            $count = count($cheats);
            $data = 'cheats = '.$count.chr(10).chr(10);
            $int = 0;
            foreach($cheats as $cheat) {
                $cheat = Cheat::getCode($cheat);
                $code = str_replace('\n', '', $cheat->code);
                $data
                    .= 'cheat'.$int.'_desc = "'.$cheat->name.'"'
                    .chr(10)
                    .'cheat'.$int.'_code = "'.$code.'"'
                    .chr(10)
                    .'cheat'.$int.'_enable = false';
                $int++;
            }
            Storage::disk('public')->put('cheats/cheats.cht', $data);
            return true;
        }
        else {
            return false;
        }
    }
}
