<table>
    <tr>
        <td>id</td>
        <td>nombre</td>
        <td>imagen</td>
    </tr>
    @foreach ($productos as $producto)
    <tr>
        <td>{{$producto->id}}</td>
        <td>{{$producto->nombre}}</td>
        <td>{{$producto->imagen}}</td>
    </tr>        
    @endforeach
</table>    