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
        $data = Newsletter::all();

        return view('admin.newsletters.list', ['data' => $data]);

    }

    public function destroy($id)
    {
        Newsletter::find($id)->delete();

        return redirect()->route('newsletters.index');

    }
}
