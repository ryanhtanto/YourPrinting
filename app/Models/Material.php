<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'tbl_nama_bahan';

    public $timestamps = false;
    
    protected $fillable = [
        'nama_bahan'
    ];
}
