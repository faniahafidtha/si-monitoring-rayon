<?php

namespace App\Exports;

use App\Rayon;
use Maatwebsite\Excel\Concerns\FromCollection;

class RayonsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rayon::all();
    }
}
