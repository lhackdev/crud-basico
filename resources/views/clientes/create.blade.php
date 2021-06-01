@extends('layout')
@section('title')
Crear Cliente
@endsection

@section('content')

<section>
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{url('clientes')}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Apellido</label>
              <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Direccion</label>
              <input type="text" class="form-control" name="direccion">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Fecha</label>
              <input type="date" class="form-control" placeholder="..."
                          name="fecha_nacimiento" id="inputFechaCompra" required 
                          value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Telefono</label>
              <input type="text" class="form-control" name="telefono">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Categoria</label>
              <input type="text" class="form-control" name="categoria">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
       </div>    
       
  </section>
    
@endsection