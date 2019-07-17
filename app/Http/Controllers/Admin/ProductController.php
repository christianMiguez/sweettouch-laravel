<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(12);
        return view('admin.products.index')->with(compact('products'));
    }

    public function create() {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'numeric|min:0'

        ];

        $this->validate($request, $rules);

       $product = new Product();
       $product->name = $request->input('name');
       $product->description = $request->input('description');
       $product->category_id = $request->input('category_id');
       $product->price = $request->input('price');
       $product->stock = $request->input('stock');
       $product->save(); // insert

       return redirect('/admin/products');
    }

    public function edit($id) {
        $categories = Category::orderBy('name')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product', 'categories'));
    }

    public function update(Request $request, $id) {
        $rules = [
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'numeric|min:0'

        ];

        $this->validate($request, $rules);
       $product = Product::find($id);
       $product->name = $request->input('name');
       $product->description = $request->input('description');
       $product->price = $request->input('price');
       $product->category_id = $request->category_id;
       $product->stock = $request->input('stock');
       $product->save(); //update

       return redirect('/admin/products');
    }

    public function destroy($id) {

        $product = Product::find($id);
        $product->delete(); // delete

        return back();
     }





}
