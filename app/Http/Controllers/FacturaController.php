<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\Request;

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
            'id_producto' => $producto->id_producto,
            'id_cliente' => $cliente->id_cliente,
        ]);
        // $factura->producto()->associate($producto);
        // $factura->cliente()->associate($cliente);
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
        $productos = Factura::all();
        $factura = Factura::find($id);

        return view('facturas.edit',compact('factura', compact('facturas', 'productos')));
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
}
