<?php

namespace App\Imports;

use App\{Siswa, Rayon};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswasImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $rayon = Rayon::get();
        foreach ($rows as $row) {
            Siswa::Create([
                'nis' => $row['nis'],
                'nama' => $row['nama'],
                'rombel' => $row['rombel'],
                'rayon_id' => Rayon::where('nama_rayon', $row['rayon'])->get()->first()->id,
                // 'rayon_id' => Rayon::where($row['rayon'], $rayon->nama_rayon)->first()->id,
            ]);
        }
    }
}
