<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Subscriber;

class SubscribersController extends Controller
{
    public function index()
    {
        $data = Subscriber::get();

        return view('admin.subscribers.list', ['data' => $data]);

    }

    public function show($id)
    {
        $data = Subscriber::findOrFail($id);

        return view('admin.subscribers.read', compact('data'));
    }
}
