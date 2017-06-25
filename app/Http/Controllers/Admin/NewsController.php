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

    public function store(Request $request)
    {
        DB::table('news')->insert($request->except(['_token']));

        return view('admin.messages', ['data' => $data = News::all()]);
    }
}
