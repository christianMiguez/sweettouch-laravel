<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index ($id) {
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'desc')->get();
        return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store (Request $request, $id) {
        // -> guardar imagen en nuestra app

        // obtiene fichero que se sube
        $file = $request->file('photo');
        // ruta donde guardaremos imagen
        $path = public_path() . '/images/products';
        // establecemos nombre de imagen
        $file_name = uniqid() . $file->getClientOriginalName();
        // movemos fichero desde $file de path a filen_anem
        $moved = $file->move($path, $file_name);

        if($moved) {
             // crear registro db
        $product_image = new ProductImage();
        $product_image->image = $file_name;
        $product_image->product_id = $id;
        $product_image->save(); // Hace INSERT
        }

        return back();

    }

    public function destroy (Request $request, $id) {
        $product_image = ProductImage::find($request->image_id);
        if (substr($product_image->image, 0, 4) === "http") {
            $deleted = true;
        } else {
            $full_path = public_path() . '/images/products/' . $product_image->image;
            $deleted = File::delete($full_path);
        }

        if($deleted) {
            $product_image->delete();
        }

        return back();

    }

    public function select($id, $image) {

        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);

        $product_image = ProductImage::find($image);
        $product_image->featured = true;
        $product_image->save();

        return back();

    }

}
