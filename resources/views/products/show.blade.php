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
    <h3>Producto name: {{$product->name}}</h3><br>
    <img src="{{$product->featured_image_url}}" alt="">

   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Añadir al carrito
  </button>



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

            @if (session('notification'))
                <div class="alert alert-success">{{session('notification')}}</div>
            @endif

          </div>

          <div class="text-center">

          </div>

        </div>
      </div>

    </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form method="post" action="{{url('/cart')}}">
    @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar al carrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                  <input type="hidden" name="product_id" value="{{$product->id}}">
                      <label for="exampleFormControlSelect1">SELECCIONAR CANTIDAD</label>
                      <select class="form-control selectpicker" data-style="btn btn-link" value="1" name="quantity" id="exampleFormControlSelect1">
                        <option value=1 selected>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                        <option value=5>5</option>
                      </select>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Agregar producto</button>
              </div>
            </div>
          </div>
    </form>
  </div>

  {{-- end modal --}}


@endsection
