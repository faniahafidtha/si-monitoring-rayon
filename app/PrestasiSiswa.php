<?php

namespace App;
use App\Siswa;
use Illuminate\Database\Eloquent\Model;

class PrestasiSiswa extends Model
{
    protected $fillable =['prestasi_id','siswa_id'];

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
}
