<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah ENUM jabatan agar menambah opsi 'User'
        DB::statement("ALTER TABLE users MODIFY jabatan ENUM('Admin', 'Karyawan', 'User') NOT NULL DEFAULT 'User'");
    }

    public function down(): void
    {
        // Balik ke versi sebelumnya (tanpa 'User')
        DB::statement("ALTER TABLE users MODIFY jabatan ENUM('Admin', 'Karyawan') NOT NULL DEFAULT 'Karyawan'");
    }
};
