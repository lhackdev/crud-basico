@extends('layout')
@section('title')
Crear Productos
@endsection

@section('content')

<section>
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{url('productos')}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Precio</label>
              <input type="number" class="form-control" name="precio">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Stock</label>
              <input type="number" class="form-control" name="stock">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
       </div>    
       
  </section>
    
@endsection