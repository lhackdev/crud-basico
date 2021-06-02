<?php

namespace App\Exports;

use App\Factura;
use App\Models\Factura as ModelsFactura;
use Maatwebsite\Excel\Concerns\FromCollection;

class FacturaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsFactura::all();
    }
}
