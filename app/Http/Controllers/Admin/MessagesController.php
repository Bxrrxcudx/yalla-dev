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
        $msgs = Message::all();

        return view('admin.messages', compact('msgs'));

    }

    public function show($id)
    {

        $msg = Message::findOrFail($id);

        return view('admin.message-details', compact('msg'));
    }

    public function destroy($id)
    {
    }

    public function create()
    {

        
    }

    public function store(Request $request)
    {

        DB::table('messages')->insert($request->except(['_token']));

        return view('admin.messages', ['msgs' => $msgs = Message::all()]);
    }
}

