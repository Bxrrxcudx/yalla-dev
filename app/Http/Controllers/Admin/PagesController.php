<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Page;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::withTrashed()->orderByDesc('created_at')->paginate(10);
        return view('admin.pages.list', compact('pages'));

    }

    public function create()
    {
        return view('admin.pages.add');
    }

    public function store(Request $request)
    {
        // inserts the data from POST
        Page::create($request->except(['_token']));
        // gets last insert id
        $id = DB::getPdo()->lastInsertId();
        // completes slug/meta/description fields in db
        $this->completeNewsInsert($id, 'pages');

        return redirect()->route('pages.index');
    }

    public function edit($id)
    {
        $pages = Page::findOrFail($id);

        return view('admin.pages.edit', compact('pages'));
    }

    public function update(Request $request, $id)
    {
        $news = Page::findOrFail($id);
        $news->fill($request->except(['_token']))->save();

        return view('admin.pages.list', compact('pages'));
    }

    public function trash($id)
    {
        Page::where('id', $id)->delete();

        return redirect()->route('pages.index');
    }

    public function restore($id)
    {
        Page::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('pages.index');
    }

    public function destroy($id)
    {
        if ($data = Page::withTrashed()->where('id', $id)->exists() !== false) {
            Page::withTrashed()->where('id', $id)->forceDelete();
        }

        return redirect()->route('pages.index');

    }
}
