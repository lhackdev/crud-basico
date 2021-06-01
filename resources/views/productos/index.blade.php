@extends('layout')
@section('title')
Productos 
@endsection
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <section>
    <div class="card">
      <div class="card-body">
              <h3>Lista de productos.</h3>
              <a href="{{action('ProductoController@create')}}" style="text-decoration: none">
                <h6>
                  Agregar nuevo
                </h6>
              </a>
            </div>
            <div style="padding: 5px">
              <table class="table table-bordered dataTable table-responsive" id="myTable" style="font-size: 13px;">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th style="text-align: center;">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($productos as $producto)
                  <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{number_format($producto->precio)}}</td>
                    <td>{{ $producto->stock }}</td>
                    {{-- <td>{{ $producto->factura->num_factura }}</td> --}}
                    <td style="text-align: center">
                      <div>
                        <form method="POST" action="{{url("productos/$producto->id_producto")}}">
                          @csrf
                          @method('DELETE')
                          {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                          <a href="{{action('ProductoController@edit', $producto->id_producto)}}" class="btn btn-primary"> <i class="fa  fa-edit"></i></a>
                          <button class="btn btn-danger">
                            <i class="fa  fa-trash">
                            </i></button>
                          </a>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
           
          </div>    
  </section>
@endsection