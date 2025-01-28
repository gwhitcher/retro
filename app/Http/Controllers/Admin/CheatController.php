<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cheat;
use App\Models\Page;
use Illuminate\Http\Request;

class CheatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function system()
    {
        $systems = Cheat::getSystems();
        return view('admin.cheat.system.index')
            ->with([
                'systems' => $systems
            ]);
    }

    public function systemAdd(Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'name' => 'required',
            ]);

            Cheat::systemAdd($request);

            $request->session()->flash('alert-message', 'System added successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.cheat.system.index');
        }
        return view('admin.cheat.system.manage')
            ->with('edit', false);
    }

    public function systemEdit($id, Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'name' => 'required',
            ]);

            Cheat::systemEdit($id, $request);

            $request->session()->flash('alert-message', 'System updated successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.cheat.system.index');
        }
        $system = Cheat::getSystem($id);
        return view('admin.cheat.system.manage')
            ->with([
                'system' => $system,
                'edit' => true
            ]);
    }

    public function systemDelete($id, Request $request) {
        $system = Cheat::getSystem($id);
        if(!empty($system)) {
            Cheat::systemRemove($id);
            $request->session()->flash('alert-message', 'System deleted successfully.');
            $request->session()->flash('alert-type', 'success');
        } else {
            $request->session()->flash('alert-message', 'System not found.');
            $request->session()->flash('alert-type', 'danger');
        }
        return redirect()->route('admin.cheat.system.index');
    }

    public function game()
    {
        $games = Cheat::getGamesPaginated();
        return view('admin.cheat.game.index')
            ->with([
                'games' => $games
            ]);
    }

    public function gameAdd(Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'name' => 'required',
            ]);

            Cheat::gameAdd($request);

            $request->session()->flash('alert-message', 'Game added successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.cheat.game.index');
        }
        return view('admin.cheat.game.manage')
            ->with('edit', false);
    }

    public function gameEdit($id, Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'name' => 'required',
            ]);

            Cheat::gameEdit($id, $request);

            $request->session()->flash('alert-message', 'Game updated successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.cheat.game.index');
        }
        $game = Cheat::getGame($id);
        return view('admin.cheat.system.manage')
            ->with([
                'game' => $game,
                'edit' => true
            ]);
    }

    public function gameDelete($id, Request $request) {
        $game = Cheat::getGame($id);
        if(!empty($game)) {
            Cheat::gameRemove($id);
            $request->session()->flash('alert-message', 'Game deleted successfully.');
            $request->session()->flash('alert-type', 'success');
        } else {
            $request->session()->flash('alert-message', 'Game not found.');
            $request->session()->flash('alert-type', 'danger');
        }
        return redirect()->route('admin.cheat.game.index');
    }

    public function device()
    {
        $devices = Cheat::getDevices();
        return view('admin.cheat.device.index')
            ->with([
                'devices' => $devices
            ]);
    }

    public function deviceAdd(Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'name' => 'required',
            ]);

            Cheat::deviceAdd($request);

            $request->session()->flash('alert-message', 'Device added successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.cheat.device.index');
        }
        return view('admin.cheat.device.manage')
            ->with('edit', false);
    }

    public function deviceEdit($id, Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'name' => 'required',
            ]);

            Cheat::deviceEdit($id, $request);

            $request->session()->flash('alert-message', 'Device updated successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.cheat.device.index');
        }
        $device = Cheat::getDevice($id);
        return view('admin.cheat.device.manage')
            ->with([
                'device' => $device,
                'edit' => true
            ]);
    }

    public function deviceDelete($id, Request $request) {
        $device = Cheat::getDevice($id);
        if(!empty($device)) {
            Cheat::deviceRemove($id);
            $request->session()->flash('alert-message', 'Device deleted successfully.');
            $request->session()->flash('alert-type', 'success');
        } else {
            $request->session()->flash('alert-message', 'Device not found.');
            $request->session()->flash('alert-type', 'danger');
        }
        return redirect()->route('admin.cheat.device.index');
    }

    public function code()
    {
        $codes = Cheat::getCodesPaginated();
        return view('admin.cheat.code.index')
            ->with([
                'codes' => $codes
            ]);
    }

    public function codeAdd(Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'name' => 'required',
            ]);

            Cheat::codeAdd($request);

            $request->session()->flash('alert-message', 'Code added successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.cheat.code.index');
        }
        return view('admin.cheat.code.manage')
            ->with('edit', false);
    }

    public function codeEdit($id, Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'name' => 'required',
            ]);

            Cheat::codeEdit($id, $request);

            $request->session()->flash('alert-message', 'Code updated successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.cheat.code.index');
        }
        $code = Cheat::getCode($id);
        return view('admin.cheat.code.manage')
            ->with([
                'code' => $code,
                'edit' => true
            ]);
    }

    public function codeDelete($id, Request $request) {
        $code = Cheat::getCode($id);
        if(!empty($code)) {
            Cheat::codeRemove($id);
            $request->session()->flash('alert-message', 'Code deleted successfully.');
            $request->session()->flash('alert-type', 'success');
        } else {
            $request->session()->flash('alert-message', 'Code not found.');
            $request->session()->flash('alert-type', 'danger');
        }
        return redirect()->route('admin.cheat.code.index');
    }
}
