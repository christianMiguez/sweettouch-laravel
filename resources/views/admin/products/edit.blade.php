@extends('layouts.app')

@section('body-class', 'sidebar-collapse')

@section('content')

    <div class="container">

      <div class="section text-center">
        <h2 class="title">Editar Producto</h2>
        <div class="team">
          <div class="row">

          <form method="post" action="{{url('/admin/products/'.$product->id.'/edit')}}">
            @csrf

            <div class="form-group label-floating">
                <label class="control-label" for="name">Name</label>
            <input class="form-control" type="text" id="name" name="name" required value="{{old('name', $product->name)}}">

            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description">{{old('description', $product->description)}}</textarea>

            </div>

            <div class="form-group label-floating">
                    <label class="control-label" for="category">Categoría</label>
                    <select class="form-control selectpicker" data-style="btn btn-link" id="category_id" name="category_id">
                        @foreach ($categories as $cat)
                    <option value="{{$cat->id}}" @if($cat->id == old('category_id', $product->category_id)) selected @endif>{{$cat->name}}</option>
                        @endforeach
                    </select>

                </div>

            <div class="form-group label-floating">
                <label class="control-label" for="price">Precio</label>
                <input class="form-control" type="number" id="price" name="price" required placeholder="100" value="{{old('price', $product->price)}}">

            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="stock">Stock</label>
                <input class="form-control" type="number" id="stock" name="stock" required placeholder="5000" value="{{old('stock', $product->stock)}}">

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


            </form>

          </div>
        </div>

    </div>
@endsection
