<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Message;
use App\News;
use App\Newsletter;
use App\Page;
use App\Subscriber;
use App\Tag;
use App\User;
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

    public function getAllNews()
    {
        $news = News::with('category', 'tags')->get();

        return view('front.actualites', compact('news'));
    }

    public function getNewsById($id)
    {
        $news = News::findOrFail($id)->get();

        return view('front.article', compact('news'));
    }

    public function about()
    {
        return view('front.presentation');
    }

    public function missions()
    {
        return view('front.mission');
    }

    public function donate()
    {
        return view('front.donations');
    }

    public function contact()
    {
        return view('front.contact');
    }

}
