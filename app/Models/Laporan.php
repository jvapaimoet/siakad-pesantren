<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan'; 

    protected $fillable = [
        'jenis_laporan',
        'kategori',
        'tipe_transaksi',
        'nominal',
        'deskripsi',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'nominal' => 'decimal:2',
    ];
}
