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
    Schema::table('request_perbaikans', function (Blueprint $table) {
        $table->string('kode')->nullable()->after('id');
        $table->unsignedBigInteger('user_id')->nullable()->after('kode');
        $table->unsignedBigInteger('cabang_id')->nullable()->after('user_id');
    });
}

public function down()
{
    Schema::table('request_perbaikans', function (Blueprint $table) {
        $table->dropColumn(['kode', 'user_id', 'cabang_id']);
    });
}

};
