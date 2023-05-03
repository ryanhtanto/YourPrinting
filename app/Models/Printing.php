<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Printing extends Model
{
    use HasFactory;

    protected $table = 'tbl_tempat_printing';

    public $timestamps = false;

    public function service(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'tbl_daftar_service', 'id_tempat_printing', 'id_service');
    }

    public function material(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'tbl_daftar_service', 'id_tempat_printing', 'id_bahan');
    }

    public function size(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'tbl_daftar_service', 'id_tempat_printing', 'id_ukuran');
    }

    public function daftarService(): HasMany
    {
        return $this->hasMany(DaftarService::class, 'id_tempat_printing');
    }
    
}
