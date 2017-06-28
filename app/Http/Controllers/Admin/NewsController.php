<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsFormRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use App\Tag;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::withTrashed()->with('category')->orderByDesc('created_at')->paginate(10);

        return view('admin.news.list', compact('news'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        $tags = Tag::pluck('name', 'id');

        return view('admin.news.add', compact('categories', 'tags'));
    }

    public function store(NewsFormRequest $request)
    {

        // inserts the data from POST
        $news = News::create($request->except(['_token', 'tags_list']));


        $news->syncTags($news, $request->input('tags_list'));

        // completes slug/meta/description fields in db
        $this->completeInsert($news->id, 'news');

        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $news = News::withTrashed()->findOrFail($id);

        $categories = Category::pluck('name', 'id');

        $tags = Tag::pluck('name', 'id');

        $tagIds = array_pluck($news->tags->toArray(), 'id');


        return view('admin.news.edit', compact('news', 'categories', 'tags', 'tagIds'));
    }

    public function update(NewsFormRequest $request, $id)
    {

        $news = News::findOrFail($id);

        $news->update($request->except(['_token', 'tags_list']));

        $news->syncTags($news, $request->input('tags_list'));

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
