@extends('layouts.app')

@section('body-class', 'sidebar-collapse')

@section('content')

  </div>

  <div class="">
    <div class="container">




      <div class="section text-center">
        <h2 class="title">Imágenes de "{{$product->name}}"</h2>
          <div class="row">
          <form method="post" action="" enctype="multipart/form-data">
          @csrf
            <input name="photo" id="" type="file" required>
            <button type="submit" href="{{url('/admin/products/create')}}" class="btn btn-success btn-round">Subir nueva imagen</button>
          <a href="{{url('/admin/products')}}" class="btn btn-default btn-round">Volver a Productos</a>
          </form>

          <hr>


          </div>
          <div class="row">
          @foreach ($images as $img )
                <div class="card col-md-4">
                    <img class="card-img-top" width="250" src="{{$img->url}}" alt="Card image cap">
                <br />
                <form method="post" action="" >
                    @csrf;
                    @method('DELETE');
                <input type="hidden" name="image_id" value="{{$img->id}}">
                    <button type="submit" class="btn btn-danger">Eliminar imagen</button>
                    @if ($img->featured)
                    <button type="button" class="btn btn-secondary" rel="tooltip" title="Esta es la imagen destacada">Destacada</button>
                    @else <a href="{{url('admin/products/'.$product->id.'/images/select/'.$img->id)}}" class="btn btn-warning">Destacada</a>
                    @endif;
                </form>
                </div>
            @endforeach
        </div>
      </div>



    </div>
@endsection
