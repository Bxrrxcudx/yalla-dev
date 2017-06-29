<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Page;

class PagesController extends Controller
{
    /**
     * renders list of pages
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pages = Page::withTrashed()->orderByDesc('created_at')->paginate(10);

        return view('admin.pages.list', compact('pages'));

    }

    /**
     * renders the page add form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.add');
    }

    /**
     * stores new page in the db
     * @param PageFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PageFormRequest $request)
    {
        // inserts the data from POST
        $page = Page::create($request->except(['_token']));

        // completes slug/meta/description fields in db
        $this->completeInsert($page->id, 'pages');

        return redirect()->route('pages.index');
    }

    /**
     * renders the edit form
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $pages = Page::findOrFail($id);

        return view('admin.pages.edit', compact('pages'));
    }

    /**
     * validates form with PageFormRequest rules
     * and updates db
     * @param PageFormRequest $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(PageFormRequest $request, $id)
    {
        $news = Page::findOrFail($id);

        $news->update($request->except(['_token']));

        return view('admin.pages.list', compact('pages'));
    }

    /**
     * soft deletes a page
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function trash($id)
    {
        Page::where('id', $id)->delete();

        return redirect()->route('pages.index');
    }

    /**
     * restore a page from soft deletion
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        Page::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('pages.index');
    }

    /**
     * permanently deletes a page from db
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($data = Page::withTrashed()->where('id', $id)->exists() !== false) {

            Page::withTrashed()->where('id', $id)->forceDelete();

        }

        return redirect()->route('pages.index');

    }
}
