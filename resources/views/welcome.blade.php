@extends('layouts.app')

@section('styles')
<style>
    .tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 422px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
</style>
@endsection

@section('body-class', 'product-page sidebar-collapse')

@section('content')




  </div>

  <section class="section">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel carousel-fade  slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('img/bg2.jpg')}}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/bg3.jpg')}}" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/bg.jpg')}}" alt="Third slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/bg4.jpg')}}" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
  </section>

  <div class="container">

    <div class="row">

    <form action="{{url('/search')}}" method="get" class="form form-inline">
            <input type="text" class="form-control" name="query" placeholder="¿Que tipo de producto buscas?" id="search">
            <button type="submit" class="btn btn-primary">
                    <i class="material-icons">search</i>
            </button>
        </form>
    </div>
  </div>

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

@section('scripts')
<script src="{{asset('/js/typeahead.bundle.js')}}"></script>
<script>
$(function() {

    var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '{{url("/products/json")}}'
    });

$('#search').typeahead({
    hint: true,
    hightlight: true,
    minLength: 1
}, {
    name: 'products',
    source: products
})
});
</script>
@endsection;
