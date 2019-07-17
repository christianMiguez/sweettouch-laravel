@extends('layouts.app')

@section('body-class', 'sidebar-collapse')

@section('content')

    <div class="container">

      <div class="section text-center">
        <h2 class="title">Editar Categoría</h2>
        <div class="team">
          <div class="row">

          <form method="post" action="{{url('/admin/categories/'.$category->id.'/edit')}}">
            @csrf

            <div class="form-group label-floating">
                <label class="control-label" for="name">Name</label>
            <input class="form-control" type="text" id="name" name="name" required value="{{old('name', $category->name)}}">

            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description">{{old('description', $category->description)}}</textarea>

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>


            </form>

          </div>
        </div>

    </div>
@endsection
