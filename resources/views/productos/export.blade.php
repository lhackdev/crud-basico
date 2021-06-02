<table class="display" style="width:100%" id="myTable" style="font-size: 13px;">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Stock</th>
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $producto)
    <tr>
      <td style="text-align: center">{{ $producto->nombre }}</td>
      <td style="text-align: center">{{number_format($producto->precio)}}</td>
      <td style="text-align: center">{{ $producto->stock }}</td>
    </tr>
    @endforeach
  </tbody>
</table>