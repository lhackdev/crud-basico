@extends('layout')
@section('title')
Productos 
@endsection
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <div class="container">
    <div class="card">
      <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h3>Lista de productos.</h3>
                <a href="{{action('ProductoController@create')}}" style="text-decoration: none">
                  <h6>
                    Agregar nuevo
                  </h6>
                </a>
              </div>
              <div class="col-md-6" style="text-align: end">
                <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Exportar Productos
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{url("exportproductos/excel")}}">Excel</a></li>
                    <li><a class="dropdown-item" href="{{url("exportproductos/pdf")}}">Pdf</a></li>
                    <li><a class="dropdown-item" href="{{url("exportproductos/csv")}}">Csv</a></li>
                    <li><a class="dropdown-item" href="{{url("exportproductos/html")}}">Html</a></li>
                  </ul>
                </div>
              </div>
            </div>
            
            <div style="padding: 5px">
              <table class="display" style="width:100%" id="myTable" style="font-size: 13px;">
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
    </div>    
  </section>
@endsection