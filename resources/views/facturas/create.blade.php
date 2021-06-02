@extends('layout')
@section('title')
Crear Facturas
@endsection

@section('content')

<section>
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{url('facturas')}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Cliente</label>
              <select class="form-select" aria-label="Default select example" name="cliente">
                <option selected>Seleccione</option>
                @foreach ($clientes as $cliente)
                  <option value="{{$cliente->id_cliente}}">{{$cliente->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Fecha</label>
              <input type="date" class="form-control" placeholder="..."
                          name="fecha" id="inputFechaCompra" required 
                          value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Producto</label>
            <select class="form-select" aria-label="Default select example" name="producto">
              <option selected>Seleccione</option>
              @foreach ($productos as $producto)
                <option value="{{$producto->id_producto}}">{{$producto->nombre}}</option>
              @endforeach
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
       </div>    
       
  </section>
    
@endsection