<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel jenis_barang
            $table->unsignedBigInteger('jenis_id')->nullable();
            $table->foreign('jenis_id')->references('id')->on('jenis_barang')->onDelete('set null');

            // Detail barang
            $table->string('nama_barang');
            $table->integer('stok')->default(0);
            $table->string('satuan', 50)->nullable();     // contoh: pcs, unit, dus, pack
            $table->decimal('harga', 15, 2)->nullable();  // harga barang
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
}
