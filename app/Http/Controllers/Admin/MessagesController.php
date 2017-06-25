<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Message;


class MessagesController extends Controller
{
    public function index()
    {
        $msgs = Message::orderByDesc('sent_date')->paginate(10);

        return view('admin.messages.list', compact('msgs'));

    }

    public function create()
    {


    }

    public function store(Request $request)
    {

        DB::table('messages')->insert($request->except(['_token']));

        return redirect()->route('messages.index');
    }

    public function show($id)
    {
        $msg = Message::findOrFail($id);

        return view('admin.messages.read', compact('msg'));
    }

    public function trash($id)
    {
        Message::where('id', $id)->delete();

        return redirect()->route('messages.index');

    }

    public function showTrashed()
    {
        $msgs = Message::onlyTrashed()->orderByDesc('sent_date')->paginate(10);

        return view('admin.messages.trashed', compact('msgs'));
    }


    public function destroy($id)
    {

        Message::where('id', $id)->forceDelete();

        return redirect()->route('messages.trashed');

    }

}

