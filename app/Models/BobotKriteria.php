<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    use HasFactory;

    protected $table = 'tbl_bobot_kriteria';

    public $timestamps = false;

    protected $fillable = [
        'jenis_layanan',
        'bahan',
        'harga',
        'respon',
        'ukuran'
    ];
}
