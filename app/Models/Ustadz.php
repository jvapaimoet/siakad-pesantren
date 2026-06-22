<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ustadz extends Model
{
    use HasFactory;

    protected $table = 'ustadz';

    // Mengosongkan guarded berarti mengizinkan Laravel menyimpan field APAPUN yang kita kirim dari controller
    protected $guarded = []; 
}