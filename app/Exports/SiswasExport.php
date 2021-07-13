<?php

namespace App\Exports;

use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswasExport implements FromView
{

    public function view(): View
    {
        return view('siswa.siswa-excel', [
            'siswas' => Siswa::all()
        ]);
    }
}
