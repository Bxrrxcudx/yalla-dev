<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.news.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create($request->except(['_token']));

        $id = DB::getPdo()->lastInsertId();

        $category = Category::findOrFail($id);

        $category->createSlug($category);

        return redirect()->route('categories.index');
    }

    public function edit()
    {
        $categories = Category::all();

        return view('category-edit', compact($categories));
    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        $category->update($request->except(['_token']));

        $category->createSlug($category);

        return redirect()->route('categories.index');

    }

    public function destroy($id)
    {

        if(Category::where('id', $id)->exists() !== false){
            Category::where('id', $id)->delete();
        }

        return redirect()->route('categories.index');

    }
}
