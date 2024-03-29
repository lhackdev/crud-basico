<?php

namespace App\Http\Controllers;

use App\Exports\ProductoExport;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $productos->load('factura');
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $producto = new Producto();
        $producto->fill([
            "nombre" => $request->nombre,
            "precio" => $request->precio,
            "stock" => $request->stock,
        ]);

        $producto->save();
        
        return redirect('/productos');
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
        $facturas = Factura::all();
        $producto = Producto::find($id);

        return view('productos.edit',compact('producto', compact('facturas')));
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
        $producto = Producto::find($id);
        $producto->fill($request->all());
        $producto->update();

        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/productos');
    }

    public function export($tipo){
        if($tipo == "pdf"){
            $productos = Producto::all();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('productos.export', ['productos'  => $productos])
            ->setPaper('a4', 'landscape')
            ->stream('archivo.pdf');
            return $pdf->stream();
        }else if ($tipo == "excel"){
            return Excel::download(new ProductoExport, 'producto.xlsx');
        }else if ($tipo == "csv"){
            return Excel::download(new ProductoExport, 'producto.csv');
        }
        else if ($tipo == "html"){
            return Excel::download(new ProductoExport, 'producto.html');
        }   
    }
}
