<!DOCTYPE html>
<html >
<head>

    <title>Nuevo Pedido</title>
</head>
<body>
<p>Se ha realizado un nuevo pedido</p>
<p>ESTOS SON LOS DATOS DEL CLIENTE</p>

<ul>
<li>Nombre: {{$user->name}}</li>
<li>Email: {{$user->email}}</li>
<li>Fecha del pedido: {{$cart->order_date}}</li>
</ul>
<hr>
<strong>DETALLES DEL PEDIDO</strong>
<ul>
    @foreach ($cart->details as $detail )
    <li>
        {{$detail->product->name}} ($ {{$detail->product->price}}) x {{$detail->quantity}} <br>
        ($ {{$detail->quantity * $detail->product->price}})
    </li>
    @endforeach
<strong>A pagar: {{$cart->total}}</strong>
</ul>
<a href="{{url('/admin/orders/'.$cart->id)}}">Ver mas info del pedido</a>
</body>
</html>
