@extends('layout')
@section('title')
Clientes 
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
            <h3>Lista de clientes.</h3>
            <a href="{{action('ClienteController@create')}}" style="text-decoration: none">
              <h6>
                Agregar nuevo
              </h6>
            </a>    
          </div>    
            <div class="col-md-6" style="text-align: end">
              <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Exportar clientes
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{url("exportcliente/excel")}}">Excel</a></li>
                  <li><a class="dropdown-item" href="{{url("exportcliente/pdf")}}">Pdf</a></li>
                  <li><a class="dropdown-item" href="{{url("exportcliente/csv")}}">Csv</a></li>
                  <li><a class="dropdown-item" href="{{url("exportcliente/html")}}">Html</a></li>
                </ul>
              </div>
            </div>
        </div>
 
            <div  style="padding: 5px">
              <table  class="display" id="myTable" style="width:100%">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Fecha Nacimiento</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Categoria</th>
                    <th style="text-align: center;">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clientes as $cliente)
                  <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido}}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->fecha_nacimiento }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->categoria }}</td>
                    <td>
                      <div>
                        <form method="POST" action="{{url("clientes/$cliente->id_cliente")}}">
                          @csrf
                          @method('DELETE')
                          {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                          <a href="{{action('ClienteController@edit', $cliente->id_cliente)}}" class="btn btn-primary"> <i class="fa  fa-edit"></i></a>
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
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Fecha Nacimiento</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Categoria</th>
                    <th style="text-align: center;">Acciones</th>
                  </tr>
                </tfoot>
              </table>
            </div>
           
          </div>    
    </div>
@endsection