@extends('layout')
@section('title')
Crear Producto
@endsection

@section('content')

<section>
    <div class="card">
      <div class="card-body">
        <form method="POST"  action="{{action('ProductoController@update', $producto->id_producto)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{$producto->nombre}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Precio</label>
              <input type="text" class="form-control" name="precio"  value="{{$producto->precio}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">stock</label>
              <input type="text" class="form-control" name="stock"  value="{{$producto->stock}}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
       </div>    
       
  </section>
    
@endsection