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
        $data = Page::all();

        return view('admin.pages', ['data' => $data]);

    }
}
