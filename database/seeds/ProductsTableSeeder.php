<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductImage;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Category::class, 5)->create();
        // factory(Product::class, 30)->create();
        // factory(ProductImage::class, 200)->create();

        /** MODEL FACTORY RELATIONS */

        //creamos la categoría
        $categories = factory(Category::class, 1)->create();

        //para cada categoria solicitamos la creacion de
        $categories->each(function ($category) {
            //creamos colección a guardar, con make hacemos que no persista.
            // queremos que cada categoría tenga 20 productos
            $products = factory(Product::class, 1)->make();

            //le damos la orden de que guarde productos dentro de la categoría
            $category->products()->saveMany($products);


            // queremos que cada producto tenga 5 imagenes
            $products->each(function ($product) {
                $images = factory(ProductImage::class, 5)->make();
                $product->images()->saveMany($images);
            });
        });
    }
}
