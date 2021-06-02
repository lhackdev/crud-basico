<?php

namespace App\Exports;

use App\Cliente;
use App\Models\Cliente as ModelsCliente;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClienteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsCliente::all();
    }
}
