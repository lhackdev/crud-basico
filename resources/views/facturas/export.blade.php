<table style="width: 100%">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Fecha</th>
      <th>Producto</th>
    </tr>
  </thead>
  <tbody>
    @foreach($facturas as $factura)
    <tr>
      <td style="text-align: center">>{{ $factura->cliente->nombre}}</td>
      <td style="text-align: center">>{{ $factura->fecha }}</td>
      <td style="text-align: center">>{{ $factura->producto->nombre }}</td>
    </tr>
    @endforeach
  </tbody>
</table>