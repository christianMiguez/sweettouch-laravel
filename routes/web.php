<?php
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/nosotros', 'HomeController@nosotros')->name('nosotros');
Route::get('/products/json', 'SearchController@data');

Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');

Route::get('/search/', 'SearchController@show');


Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');




Route::middleware(['auth'])->group(function () {
    // crud
    Route::get('/admin/products', 'Admin\ProductController@index'); // listado de productos
    Route::get('/admin/products/create', 'Admin\ProductController@create'); // crear productos form
    Route::post('/admin/products', 'Admin\ProductController@store'); // crear action
    Route::get('/admin/products/{id}/edit', 'Admin\ProductController@edit'); // editar producto
    Route::post('/admin/products/{id}/edit', 'Admin\ProductController@update'); // crear action
    Route::delete('/admin/products/{id}', 'Admin\ProductController@destroy'); // crear action

    Route::get('/admin/products/{id}/images', 'Admin\ImageController@index');
    Route::post('/admin/products/{id}/images', 'Admin\ImageController@store');
    Route::delete('/admin/products/{id}/images', 'Admin\ImageController@destroy');
    Route::get('/admin/products/{id}/images/select/{image}', 'Admin\ImageController@select');
});


Route::get('/admin/categories', 'Admin\CategoryController@index'); // listado de productos
    Route::get('/admin/categories/create', 'Admin\CategoryController@create'); // crear productos form
    Route::post('/admin/categories', 'Admin\CategoryController@store'); // crear action
    Route::get('/admin/categories/{category}/edit', 'Admin\CategoryController@edit'); // editar producto
    Route::post('/admin/categories/{category}/edit', 'Admin\CategoryController@update'); // crear action
    Route::delete('/admin/categories/{category}', 'Admin\CategoryController@destroy'); // crear action
