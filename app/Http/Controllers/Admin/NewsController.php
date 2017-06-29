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

    /**
     * renders list of news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // gets all the news, including unpublished (soft deleted) ones
        // ordered by creation date
        // with pagination every 10 news entries
        $news = News::withTrashed()->with('category')->orderByDesc('created_at')->paginate(10);

        return view('admin.news.list', compact('news'));
    }

    /**
     * renders the news add form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // gets all categories in array 'id' => 'name'
        $categories = Category::pluck('name', 'id');

        // gets all tags in array 'id' => 'name'
        $tags = Tag::pluck('name', 'id');

        return view('admin.news.add', compact('categories', 'tags'));
    }

    /**
     * validates form with NewsFormRequest rules
     * and stores a new article in db
     * @param NewsFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsFormRequest $request)
    {

        // inserts the data from POST
        $news = News::create($request->except(['_token', 'tags_list']));

        // synchronises the current article with its tags in pivot table
        $news->syncTags($news, $request->input('tags_list'));

        // completes slug/meta/description fields in db
        $this->completeInsert($news->id, 'news');

        return redirect()->route('news.index');
    }

    /**
     * renders the edit form for a specific article
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $news = News::withTrashed()->findOrFail($id);

        $categories = Category::pluck('name', 'id');

        $tags = Tag::pluck('name', 'id');

        // gets an array 'id' => 'tag_id'
        $tagIds = array_pluck($news->tags->toArray(), 'id');


        return view('admin.news.edit', compact('news', 'categories', 'tags', 'tagIds'));
    }

    /**
     * validates form with NewsFormRequest rules
     * and updates specific article in the db
     * @param NewsFormRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsFormRequest $request, $id)
    {

        $news = News::findOrFail($id);

        $news->update($request->except(['_token', 'tags_list']));

        $news->syncTags($news, $request->input('tags_list'));

        return redirect()->route('news.index');
    }

    /**
     * soft deletes an article (equals unpublishing)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function trash($id)
    {
        News::where('id', $id)->delete();

        return redirect()->route('news.index');
    }

    /**
     * restore the article from the soft deletion (equals republishing)
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        News::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('news.index');
    }

    /**
     * permanently deletes an article from the db
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($data = News::withTrashed()->where('id', $id)->exists() !== false) {

            News::withTrashed()->where('id', $id)->forceDelete();

        }

        return redirect()->route('news.index');
    }
}
