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
        Schema::create('laporan_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('jumlah_masuk');
            $table->integer('jumlah_stock');
            $table->float('harga_satuan', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_barang_masuk');
    }
};
