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

          <form method="post" action="{{url('/admin/categories')}}">
            @csrf

            <div class="form-group label-floating">
                <label class="control-label" for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name" required placeholder="Agridulce" value="{{old('name')}}">

            </div>

            <div class="form-group label-floating">
                <label class="control-label" for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>


            </form>

          </div>
        </div>

    </div>
@endsection
