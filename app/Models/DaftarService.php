<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DaftarService extends Model
{
    use HasFactory;

    protected $table = 'tbl_daftar_service';

    public $timestamps = false;

    protected $fillable = [
        'id_tempat_printing',
        'id_bahan',
        'id_service',
        'harga'
    ];

}
