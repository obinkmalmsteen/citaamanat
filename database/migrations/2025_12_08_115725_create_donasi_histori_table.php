<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('donasi_histori', function (Blueprint $table) {
    $table->id();
    $table->foreignId('donatur_id')
          ->constrained('donatur')
          ->onDelete('cascade');

    $table->integer('jumlah_donasi');
    $table->timestamps();
});
