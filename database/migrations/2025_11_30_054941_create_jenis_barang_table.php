<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisBarangTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jenis_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis');       // contoh: Bahan Makanan, Alat Dapur
            $table->string('kode_jenis')
                  ->nullable()
                  ->unique();                  // opsional: kode unik untuk kategori
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_barang');
    }
}
