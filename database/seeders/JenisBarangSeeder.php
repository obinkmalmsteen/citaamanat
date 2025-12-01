<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_jenis' => 'Peralatan Masak Besar', 'kode_jenis' => 'PMB'],
            ['nama_jenis' => 'Peralatan Masak Kecil', 'kode_jenis' => 'PMK'],
            ['nama_jenis' => 'Peralatan Pengemasan & Penyajian', 'kode_jenis' => 'PPS'],
            ['nama_jenis' => 'Infrastruktur Gas & Energi', 'kode_jenis' => 'IGE'],
            ['nama_jenis' => 'Infrastruktur Air & Sanitasi', 'kode_jenis' => 'IAS'],
            ['nama_jenis' => 'Infrastruktur Listrik & Pencahayaan', 'kode_jenis' => 'ILP'],
            ['nama_jenis' => 'Peralatan Penyimpanan & Furniture', 'kode_jenis' => 'PPF'],
            ['nama_jenis' => 'Peralatan Kebersihan', 'kode_jenis' => 'PKB'],
            ['nama_jenis' => 'ATK (Alat Tulis Kantor)', 'kode_jenis' => 'ATK'],
            ['nama_jenis' => 'Peralatan IT & Dokumentasi', 'kode_jenis' => 'ITD'],
            ['nama_jenis' => 'Peralatan Keamanan (Safety)', 'kode_jenis' => 'PSF'],
        ];

        DB::table('jenis_barang')->insert($data);
    }
}
