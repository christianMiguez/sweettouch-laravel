@extends('layouts.app')

@section('body-class', 'sidebar-collapse')

@section('content')

    <div class="container">

      <div class="section text-center">
        <h2 class="title">Nuevo Producto</h2>
        <div class="team">
          <div class="row">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $err )
                        <li>{{$err}}</li>
                    @endforeach
                </ul>
            </div>
            @endif;

          <form method="post" action="{{url('/admin/products')}}">
            @csrf

            <div class="form-group label-floating">
                <label class="control-label" for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name" required placeholder="Bananitas Dulces" value="{{old('name')}}">

            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>

            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="category">Categoría</label>
                <select class="form-control selectpicker" data-style="btn btn-link" id="category_id" name="category_id">
                    @foreach ($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="price">Precio</label>
                <input class="form-control" type="number" id="price" name="price" required placeholder="100" value="{{old('price')}}">

            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="stock">Stock</label>
                <input class="form-control" type="number" id="stock" name="stock" required placeholder="5000" value="{{old('stock')}}">

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


            </form>

          </div>
        </div>

    </div>
@endsection
