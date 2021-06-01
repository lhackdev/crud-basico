@extends('layout')
@section('title')
Facturas 
@endsection
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <section>
    <div class="card">
      <div class="card-body">
              <h3>Lista de facturas.</h3>
              <a href="{{action('FacturaController@create')}}" style="text-decoration: none">
                <h6>
                  Agregar nueva
                </h6>
              </a>
            </div>
            <div style="padding: 5px">
              <table class="table table-bordered dataTable table-responsive" id="myTable" style="font-size: 13px;">
                <thead>
                  <tr>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th style="text-align: center;">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($facturas as $factura)
                  <tr>
                    <td>{{ $factura->cliente->nombre}}</td>
                    <td>{{ $factura->fecha }}</td>
                    <td>{{ $factura->producto->nombre }}</td>
                    {{-- <td>{{ $producto->factura->num_factura }}</td> --}}
                    <td style="text-align: center">
                      <div>
                        <form method="POST" action="{{url("facturas/$factura->num_factura")}}">
                          @csrf
                          @method('DELETE')
                          {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                          <a href="{{action('FacturaController@edit', $factura->num_factura)}}" class="btn btn-primary"> <i class="fa  fa-edit"></i></a>
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