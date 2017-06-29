<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function render($slug)
    {
        if (View::exists("front.$slug")) {
            return view("front.$slug");
        }
        return view('errors.404');
    }
}
