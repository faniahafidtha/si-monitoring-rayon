<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable=['nama_prestasi','deskripsi_prestasi'];

    public function siswas(){
        return $this->hasMany(PrestasiSiswa::class);
    }

}
