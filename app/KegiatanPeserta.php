<?php

namespace App;

use App\Siswa;
use Illuminate\Database\Eloquent\Model;
class KegiatanPeserta extends Model
{
    protected $guarded=[];


    public function peserta(){
        return $this->belongsTo(Siswa::class);
    }


}
