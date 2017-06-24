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
        $msgs = Subscriber::all();

        return view('admin.pages', ['msgs' => $msgs]);

    }
}
