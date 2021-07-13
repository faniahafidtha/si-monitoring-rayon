<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable=['rayon_id','nama','deskripsi','jenis_kegiatan','hari'];

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    public function pesertas(){
        return $this->hasMany(KegiatanPeserta::class);
    }
}
