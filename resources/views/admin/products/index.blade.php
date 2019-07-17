@extends('layouts.app')

@section('body-class', 'sidebar-collapse')

@section('content')

  </div>

  <div class="">
    <div class="container">




      <div class="section text-center">
        <h2 class="title">Productos destacados</h2>
        <div class="team">
          <div class="row">
          <a href="{{url('/admin/products/create')}}" class="btn btn-success btn-round">Agregar Producto</a>
                <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th>Stock</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                            <tr>
                                <td class="text-center">{{$p->id}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->description}}</td>
                                <td>{{$p->stock}}</td>
                                <td class="text-right">&dollar; {{$p->price}}</td>
                                <td class="td-actions text-right">

                                <a href="{{url('/admin/products/'.$p->id.'/edit')}}" rel="tooltip" >
                                        <i class="material-icons">edit</i>
                                    </a>
                                 <a href="{{url('/admin/products/'.$p->id.'/images')}}" rel="tooltip" >
                                        <i class="material-icons">image</i>
                                    </a>
                                    <form method="post" action="{{url('/admin/products/'.$p->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" rel="tooltip" onclick="return confirm('¿Deseas eliminar este producto?')"; class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>
                    {{$products->links()}}

          </div>
        </div>
      </div>



    </div>
@endsection
