<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderByDesc('created_at')->paginate(10);

        return view('admin.news.list', compact('news'));

    }

    public function create()
    {
        return view('admin.news.add', []);
    }

    public function store(Request $request)
    {
        // inserts the data from POST
        DB::table('news')->insert($request->except(['_token']));

        $id = DB::getPdo()->lastInsertId();
        $this->completeNewsInsert($id);

        return redirect()->route('news.index');
    }
}
