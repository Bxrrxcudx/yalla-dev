<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::withTrashed()->orderByDesc('created_at')->paginate(10);
        return view('admin.news.list', compact('news'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.news.add', compact('categories'));
    }

    public function store(Request $request)
    {
        // inserts the data from POST
        News::create($request->except(['_token']));
        // gets last insert id
        $id = DB::getPdo()->lastInsertId();
        // completes slug/meta/description fields in db
        $this->completeNewsInsert($id);

        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::pluck('name', 'id');

        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->fill($request->except(['_token']))->save();

        return redirect()->route('news.index');
    }

    public function trash($id)
    {
        News::where('id', $id)->delete();

        return redirect()->route('news.index');
    }

    public function restore($id)
    {
        News::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        if ($data = News::withTrashed()->where('id', $id)->exists() !== false) {
            News::withTrashed()->where('id', $id)->forceDelete();
        }

        return redirect()->route('news.index');

    }
}
