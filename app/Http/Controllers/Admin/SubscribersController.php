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
        $data = Subscriber::all();

        return view('admin.subscribers', ['data' => $data]);

    }
}
