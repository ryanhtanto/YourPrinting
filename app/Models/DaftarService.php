<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    
    public function printing(): BelongsTo
    {
        return $this->belongsTo(Printing::class, 'id_tempat_printing');
    }
    public function bahan(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'id_bahan');
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

}
