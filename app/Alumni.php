<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    public $fillable = ['nama', 'tanggal_lahir', 'tahun_masuk', 'alamat', 'kontak', 'foto'];
}
