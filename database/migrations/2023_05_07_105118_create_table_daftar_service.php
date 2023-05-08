<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_daftar_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tempat_printing');
            $table->foreignId('id_service');
            $table->foreignId('id_ukuran');
            $table->foreignId('id_bahan');
            $table->integer('harga');
            $table->integer('bobot_jenis_layanan');
            $table->integer('bobot_bahan');
            $table->integer('bobot_harga');
            $table->integer('bobot_respon');
            $table->integer('bobot_ukuran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_daftar_service');
    }
};
