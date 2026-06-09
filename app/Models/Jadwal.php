<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'nama_kegiatan',
        'tempat',
        'waktu',
        'penanggung_jawab'
    ];
}
