<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('donasi_histori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donatur_id')
                ->constrained('donatur')
                ->onDelete('cascade');

            $table->integer('jumlah_donasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donasi_histori');
    }
};

