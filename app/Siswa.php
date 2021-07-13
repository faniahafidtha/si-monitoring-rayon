<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    public function pikets()
    {
        return $this->hasMany(Piket::class);
    }


}
