<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengadaanRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('pengadaan_requests', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // contoh: PR-20251201-0001
            $table->unsignedBigInteger('user_id'); // pemohon
            $table->unsignedBigInteger('cabang_id')->nullable();
            $table->enum('status', ['pending','approved','rejected','cancelled'])->default('pending');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->text('note')->nullable(); // catatan pemohon
            $table->text('approval_note')->nullable(); // catatan approver
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();

            // foreign keys (opsional, tambah jika table cabang ada)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('cabang_id')->references('id')->on('cabangs')->onDelete('set null');
            // $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengadaan_requests');
    }
}
