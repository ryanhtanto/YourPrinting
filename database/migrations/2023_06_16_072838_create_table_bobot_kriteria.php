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
        Schema::create('tbl_bobot_kriteria', function (Blueprint $table) {
            $table->id();
            $table->integer('jenis_layanan');
            $table->integer('bahan');
            $table->integer('harga');
            $table->integer('respon');
            $table->integer('ukuran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_bobot_kriteria');
    }
};
