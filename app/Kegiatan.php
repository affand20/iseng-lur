<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
      'nama_kegiatan',
      'deskripsi_kegiatan',
      'lokasi',
      'waktu',
      'poster'
    ];

    public function dokumentasis()
    {
      return $this->hasMany('App\Dokumentasi', 'kegiatan_id', 'id');
    }
}
