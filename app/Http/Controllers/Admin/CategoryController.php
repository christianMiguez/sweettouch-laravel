<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{

    public function index() {
        $categories = Category::paginate(12);
        return view('admin.categories.index')->with(compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required|min:3'

        ];

        $this->validate($request, $rules);

        // $categories = new Category();
        // $categories->name = $request->input('name');
        // $categories->description = $request->input('description');
        // $categories->save(); // insert

        Category::create($request->all()); // mass assignment

        return redirect('/admin/categories');
    }

    public function edit(Category $category) {

        return view('admin.categories.edit')->with(compact('category'));
    }

    public function update(Request $request, Category $category) {
        $rules = [
            'name' => 'required|min:3'
        ];

        $this->validate($request, $rules);
        $category->update($request->all());
        return redirect('/admin/categories');
    }

    public function destroy(Category $category) {

       $category->delete(); // delete

        return back();
    }
}
