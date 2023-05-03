<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'tbl_ukuran';

    public $timestamps = false;

    protected $fillable = [
        'jenis_ukuran'
    ];
}
