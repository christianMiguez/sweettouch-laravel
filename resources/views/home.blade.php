@extends('layouts.app')

@section('content')

<section class="section">
    <div class="container">

        @if (session('notification'))
            <div class="alert alert-danger">{{session('notification')}}</div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12"> <p></p><p><br><br><br></p>
                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                    <!--
                        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                    -->
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito de compras
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizados
                        </a>
                    </li>
                </ul>
                <div class="tab-content tab-space">
                    <div class="tab-pane active" id="dashboard-1">
                    <p>Su carrito de compras presenta {{auth()->user()->cart->details->count()}} productos</p>
                        <ul>
                            @foreach (auth()->user()->cart->details as $detail )
                        <li>{{$detail->product->name}} -> Cantidad: {{$detail->quantity}} ||

                        <form action="{{url('/cart')}}" method="post">
                        @csrf
                        @method('DELETE');
                        <input type="hidden" name="id_to_delete" value="{{$detail->id}}">
                        <button type="submit" class="btn btn-danger">DELETE</button>

                        </form></li>
                            @endforeach

                    <p><strong>IMPORTE A PAGAR: </strong>$ {{auth()->user()->cart->total}}</p>

                    <form action="{{url('/order')}}" method="post">
                        @csrf
                                    <button class="btn btn-success">
                                            REALIZAR PEDIDO YAAA
                                        </button>
                            </form>
                        </ul>
                    </div>
                    <div class="tab-pane" id="tasks-1">
                        Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                        <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
