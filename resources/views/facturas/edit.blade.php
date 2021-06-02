@extends('layout')
@section('title')
Editar Factura
@endsection

@section('content')

<section>
    <div class="card">
      <div class="card-body">
        <form method="POST"  action="{{action('FacturaController@update', $factura->num_factura)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Cliente</label>
              <select class="form-select" aria-label="Default select example" name="cliente">
                @foreach ($clientes as $cliente)
                  <option {{ $factura->cliente->id_cliente == $cliente->id_cliente ? 'selected' : ''}} value="{{$cliente->id_cliente}}">{{$cliente->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Fecha</label>
              <input type="date" class="form-control" placeholder="..."
                          name="fecha_nacimiento" id="inputFechaCompra" required 
                          value="{{ $factura->fecha }}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Producto</label>
              <select class="form-select" aria-label="Default select example" name="producto">
                @foreach ($productos as $producto)
                  <option {{ $factura->producto->id_producto == $producto->id_producto ? 'selected' : ''}} value="{{$producto->id_producto}}">{{$producto->nombre}}</option>
                @endforeach
              </select>
            </div>
            {{-- <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Producto</label>
              <input type="text" class="form-control" name="stock"  value="{{$producto->stock}}">
            </div> --}}
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
       </div>    
       
  </section>
    
@endsection