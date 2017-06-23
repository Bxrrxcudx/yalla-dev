<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Newsletter;

class NewslettersController extends Controller
{
    public function index()
    {
        $msgs = Newsletter::all();

        return view('admin.newsletters', ['msgs' => $msgs]);

    }
}
