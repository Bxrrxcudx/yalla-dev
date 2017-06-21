<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class MangaController extends Controller
{
    public function gettitle()
    {
        $data = Test::where('titre', '=', 'mikasa')->first();

        return view('test', ['data'=>$data]);
    }
}