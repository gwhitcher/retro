<?php

namespace App\Http\Controllers;

use App\Models\Cheat;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Event\Telemetry\System;

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

    public function index()
    {
        $systems = Cheat::getSystems();
        return view('cheat.index')
            ->with([
                'systems' => $systems
            ]);
    }

    public function system($id)
    {
        $system = Cheat::getSystem($id);
        $games = Cheat::getGames($id);
        return view('cheat.system')
            ->with([
                'system' => $system,
                'games' => $games
            ]);
    }

    public function game($id)
    {
        $game = Cheat::getGame($id);
        $codes = Cheat::getCodes($id);
        return view('cheat.game')
            ->with([
                'game' => $game,
                'codes' => $codes
            ]);
    }

    public function download(Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'type' => 'required',
            ]);

            $file = Cheat::saveCheatFile($request);
            if($file) {
                $type = $request->input('type');
                return Storage::disk('public')->download('cheats/cheats.'.$type);
            } else {
                $request->session()->flash('alert-message', 'Issue saving downloaded file.');
                $request->session()->flash('alert-type', 'danger');
                return redirect()->route('cheats');
            }
        }

        $request->session()->flash('alert-message', 'Unable to download cheat file.');
        $request->session()->flash('alert-type', 'danger');
        return redirect()->route('cheats');

    }
}
