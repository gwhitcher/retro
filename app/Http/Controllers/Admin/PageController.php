<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
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

    public function index()
    {
        $pages = Page::getAll();
        return view('admin.page.index')
            ->with('pages', $pages);
    }

    public function add(Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'title' => 'required',
            ]);

            Page::add($request);

            $request->session()->flash('alert-message', 'Page added successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.page.index');
        }
        return view('admin.page.manage')
            ->with('edit', false);
    }

    public function edit($id, Request $request)
    {
        if(!empty($request->input('submit'))) {
            $request->validate([
                'title' => 'required',
            ]);

            Page::edit($id, $request);

            $request->session()->flash('alert-message', 'Page updated successfully.');
            $request->session()->flash('alert-type', 'success');

            return redirect()->route('admin.page.index');
        }
        $page = Page::getSingle($id);
        return view('admin.page.manage')
            ->with([
                'page' => $page,
                'edit' => true
            ]);
    }

    public function delete($id, Request $request) {
        $page = Page::getSingle($id);
        if(!empty($page)) {
            Page::remove($id);
            $request->session()->flash('alert-message', 'Page deleted successfully.');
            $request->session()->flash('alert-type', 'success');
        } else {
            $request->session()->flash('alert-message', 'Page not found.');
            $request->session()->flash('alert-type', 'danger');
        }
        return redirect()->route('admin.page.index');
    }
}
