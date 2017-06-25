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
        $data = News::all();

        return view('admin.news', ['data' => $data]);

    }

    public function create()
    {
        return view('admin.news-add');
    }

    public function store()
    {
        dd(request()->all());
        //DB::table('news')->insert($request->except(['_token']));

        //return view('admin.news-add', ['data' => $data = News::all()]);
    }
}
