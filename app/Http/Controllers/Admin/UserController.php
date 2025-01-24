<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\UserAdmin;
use Illuminate\Http\Request;

class UserController extends Controller
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

    public function index() {
        $users = UserAdmin::getAll();
        return view('admin.user.index')
            ->with([
                'users' => $users,
            ]);
    }

    public function add(Request $request) {
        if ($request->method() == 'POST') {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);
            UserAdmin::add($request);
            $request->session()->flash('alert-message', 'User added.');
            $request->session()->flash('alert-type', 'success');
            return redirect(route('admin-users'));
        }
        return view('admin.user.manage')
            ->with([
                'edit' => false
            ]);
    }
    public function edit($id, Request $request) {
        if ($request->method() == 'POST') {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);
            UserAdmin::edit($id, $request);
            $request->session()->flash('alert-message', 'User updated.');
            $request->session()->flash('alert-type', 'success');
            return redirect(route('admin-users'));
        }
        $user = UserAdmin::getSingle($id);
        return view('admin.user.manage')
            ->with([
                'user' => $user,
                'edit' => true
            ]);
    }
    public function remove($id, Request $request) {
        UserAdmin::remove($id);
        $request->session()->flash('alert-message', 'User deleted.');
        $request->session()->flash('alert-type', 'success');
        return redirect(route('admin-users'));
    }

    public function delete($id, Request $request) {
        $user = UserAdmin::getSingle($id);
        if(!empty($user)) {
            UserAdmin::remove($id);
            $request->session()->flash('alert-message', 'User deleted successfully.');
            $request->session()->flash('alert-type', 'success');
        } else {
            $request->session()->flash('alert-message', 'User not found.');
            $request->session()->flash('alert-type', 'danger');
        }
        return redirect()->route('admin.user.index');
    }
}
