<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $fillable = [
      'kegiatan_id',
      'url',
    ];

    public function kegiatans()
    {
      return $this->belongsTo('App\Kegiatan', 'kegiatan_id', 'id');
    }
}
