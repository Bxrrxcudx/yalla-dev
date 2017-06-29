<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{


    /**
     * Renders the list of categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.news.categories', compact('categories'));
    }

    /**
     * Stores in the DB the category entry from the request
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // creates a category entry in the DB
        $category = Category::create($request->except(['_token']));

        // creates the slug for the new category
        $category->createSlug($category);

        return redirect()->route('categories.index');
    }

    /**
     *
     * Updates in the DB the category name and
     * updates the corresponding slug
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        // gets current category
        $category = Category::findOrFail($id);

        // updates the category name in db
        $category->update($request->except(['_token']));

        $category->createSlug($category);

        return redirect()->route('categories.index');

    }

    /**
     * Deletes permanently the category from db
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        if(Category::findOrFail($id) !== false){

            $category = Category::findOrFail($id);

            $category->delete();

        }

        return redirect()->route('categories.index');

    }
}
