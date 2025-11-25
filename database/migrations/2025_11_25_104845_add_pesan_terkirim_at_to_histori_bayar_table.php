<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('histori_bayar', function (Blueprint $table) {
        $table->timestamp('pesan_terkirim_at')->nullable();
    });
}

public function down()
{
    Schema::table('histori_bayar', function (Blueprint $table) {
        $table->dropColumn('pesan_terkirim_at');
    });
}

};
