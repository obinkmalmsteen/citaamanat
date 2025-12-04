<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatursTable extends Migration
{
    public function up()
    {
        Schema::create('donaturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_donatur');
            $table->unsignedBigInteger('jumlah_donasi'); // dalam rupiah
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donaturs');
    }
}
