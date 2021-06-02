<table style="width:100%">
    <thead>
      <tr>
        <th style="text-align: center">Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Fecha Nacimiento</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Categoria</th>
      </tr>
    </thead>
    <tbody>
      @foreach($clientes as $cliente)
      <tr>
        <td style="text-align: center">{{ $cliente->nombre }}</td>
        <td style="text-align: center">{{ $cliente->apellido}}</td>
        <td style="text-align: center">{{ $cliente->direccion }}</td>
        <td style="text-align: center">{{ $cliente->fecha_nacimiento }}</td>
        <td style="text-align: center">{{ $cliente->telefono }}</td>
        <td style="text-align: center">{{ $cliente->email }}</td>
        <td style="text-align: center">{{ $cliente->categoria }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>