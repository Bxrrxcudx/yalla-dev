<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Newsletter;

class NewslettersController extends Controller
{
    /**
     * renders list of newsletter's subscribers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Newsletter::all();

        return view('admin.newsletters.list', ['data' => $data]);

    }

    /**
     * deletes permanently from db a subscriber
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Newsletter::find($id)->delete();

        return redirect()->route('newsletters.index');

    }
}
