@extends('layout')
@section('title')
Crear Cliente
@endsection

@section('content')

<section>
    <div class="card">
      <div class="card-body">
        <form method="POST"  action="{{action('ClienteController@update', $cliente->id_cliente)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Apellido</label>
              <input type="text" class="form-control" name="apellido"  value="{{$cliente->apellido}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Direccion</label>
              <input type="text" class="form-control" name="direccion"  value="{{$cliente->direccion}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Fecha</label>
              <input type="date" class="form-control" placeholder="..."
                          name="fecha_nacimiento" id="inputFechaCompra" required 
                         value="{{$cliente->fecha_nacimiento}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Telefono</label>
              <input type="text" class="form-control" name="telefono"  value="{{$cliente->telefono}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Email</label>
              <input type="email" class="form-control" name="email"  value="{{$cliente->email}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Categoria</label>
              <input type="text" class="form-control" name="categoria"  value="{{$cliente->categoria}}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
       </div>    
       
  </section>
    
@endsection