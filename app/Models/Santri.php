<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    // Pastikan nama tabelnya sesuai di database Anda
    protected $table = 'santris';

    // WAJIB daftarkan kolom-kolom ini agar diizinkan masuk ke database
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'kelas',
    ];
}