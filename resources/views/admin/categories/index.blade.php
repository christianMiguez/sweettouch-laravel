@extends('layouts.app')

@section('body-class', 'sidebar-collapse')

@section('content')

  </div>

  <div class="">
    <div class="container">




      <div class="section text-center">
        <h2 class="title">Listado de Categorías</h2>
        <div class="team">
          <div class="row">
          <a href="{{url('/admin/categories/create')}}" class="btn btn-success btn-round">Agregar Categoría</a>
                <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                            <tr>
                                <td class="text-center">{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->description}}</td>
                                <td class="td-actions text-right">

                                <a href="{{url('/admin/categories/'.$cat->id.'/edit')}}" rel="tooltip" >
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <form method="post" action="{{url('/admin/categories/'.$cat->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" rel="tooltip" onclick="return confirm('¿Deseas eliminar esta categoría?')"; class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>
                    {{$categories->links()}}

          </div>
        </div>
      </div>



    </div>
@endsection
