<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengadaanRequestItemsTable extends Migration
{
    public function up()
    {
        Schema::create('pengadaan_request_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengadaan_request_id');
            $table->unsignedBigInteger('barang_id');
            $table->integer('qty')->default(1);
            $table->text('note')->nullable(); // catatan tiap item
            $table->enum('status', ['pending','approved','rejected'])->default('pending'); // optional per item
            $table->timestamps();

            $table->foreign('pengadaan_request_id')->references('id')->on('pengadaan_requests')->onDelete('cascade');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengadaan_request_items');
    }
}
