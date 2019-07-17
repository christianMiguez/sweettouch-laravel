@extends('layouts.app')

@section('styles')
<style>
</style>
@endsection

@section('body-class', 'product-page sidebar-collapse')

@section('content')




  </div>

  <section class="section">
    <div class="container">
        <br><br><br><br><br>
    <h3>Categoría name: {{$category->name}}</h3><br>
    <img src="{{$category->featured_image_url}}" width="250" alt="">
    <p>Categoría name: {{$category->description}}</p>



    </div>
  </section>

      <div class="container text-center">
            <i class="material-icons" style="color:#ffb4cd;font-size: 36px;">star</i>
            <i class="material-icons" style="color:#ffb4cd;font-size: 36px;">star</i>
            <i class="material-icons" style="color:#ffb4cd;font-size: 36px;">star</i>
            <i class="material-icons" style="color:#ffb4cd;font-size: 36px;">star</i>
            <i class="material-icons" style="color:#ffb4cd;font-size: 36px;">star</i>
            <h2 class="title">Productos destacados</h2>
        <div class="">
          <div class="row">
            @foreach ($products as $product )


            <div class="col-md-4">
              <div class="">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{ $product->featured_image_url}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                <a href="{{url('products/'.$product->id)}}"><h4 class="card-title">{{$product->name}}</h4></a>
                    <br>
                    <small class="card-description text-muted">{{$product->category_name}}</small>

                  <div class="card-body">
                    <p class="card-description">{{$product->description}}</p>
                  </div>

                </div>
              </div>
            </div>

            @endforeach

          </div>

          <div class="text-center">
                {{$products->links()}}
          </div>

        </div>
      </div>

    </div>



@endsection
