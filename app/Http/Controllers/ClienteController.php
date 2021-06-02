<?php

namespace App\Http\Controllers;

use App\Exports\ClienteExport;
use App\Exports\ProductoExport;
use App\Models\Cliente;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->fill($request->all());
        $cliente->save();
        
        return redirect('/clientes');
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
        $cliente = Cliente::find($id);

        return view('clientes.edit',compact('cliente'));
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
        $cliente = Cliente::find($id);
        $cliente->fill($request->all());
        $cliente->update();

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect('/clientes');
    }

    public function export($tipo){
        if($tipo == "pdf"){
            $clientes = Cliente::all();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('clientes.export', ['clientes'  => $clientes])
            ->setPaper('a4', 'landscape')
            ->stream('archivo.pdf');
            return $pdf->stream();
        }else if ($tipo == "excel"){
            return Excel::download(new ClienteExport, 'cliente.xlsx');
        }else if ($tipo == "csv"){
            return Excel::download(new ClienteExport, 'cliente.csv');
        }
        else if ($tipo == "html"){
            return Excel::download(new ClienteExport, 'cliente.html');
        }   
    }
}
