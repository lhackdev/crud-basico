<?php

namespace App\Http\Controllers;

use App\Exports\FacturaExport;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::all();
        $facturas->load('cliente');
        $facturas->load('producto');
        return view('facturas.index', compact('facturas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('facturas.create', compact('productos', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $producto = Producto::find($request->producto);
        $cliente = Cliente::find($request->cliente);
        
        $factura = new Factura();

        $factura->fill([
            'fecha' => $request->fecha,
        ]);
        $factura->producto()->associate($producto);
        $factura->cliente()->associate($cliente);
        $factura->save();
        
        return redirect('/facturas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        $factura = Factura::find($id);
        $factura->load('cliente');
        $factura->load('producto');

        // return $factura;

        return view('facturas.edit',compact('factura', 'productos', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $factura = Factura::find($id);
        $factura->fill($request->all());

        $producto = Producto::find($request->producto);
        $cliente = Cliente::find($request->cliente);

        $factura->producto()->associate($producto);
        $factura->cliente()->associate($cliente);

        $factura->update();

        return redirect('/facturas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factura = Factura::find($id);
        $factura->delete();
        return redirect('/facturas');
    }

    public function export($tipo){
        if($tipo == "pdf"){
            $facturas = Factura::all();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('facturas.export', ['clientes'  => $facturas])
            ->setPaper('a4', 'landscape')
            ->stream('archivo.pdf');
            return $pdf->stream();
        }else if ($tipo == "excel"){
            return Excel::download(new FacturaExport, 'factura.xlsx');
        }else if ($tipo == "csv"){
            return Excel::download(new FacturaExport, 'factura.csv');
        }
        else if ($tipo == "html"){
            return Excel::download(new FacturaExport, 'factura.html');
        }   
    }
}
