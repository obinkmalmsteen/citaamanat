<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;

    protected $table = 'masjids'; // nama tabel kamu

    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'jenis_bangunan',
        'nama_masjid',
        'jenis_layanan',
        'sesuai_id_masjid',
        'alasan_id_berbeda',
        'nama_ketua_dkm',
        'telp_ketua_dkm',
        
        'penerima_informasi',
'telp_penerima_informasi',
'provinsi_id',
'kota_id',
'kecamatan_id',
'kelurahan_id',
'alamat_lengkap',
'foto_masjid',
'foto_meteran_listrik',
'map_lokasi_masjid',
'estimasi_biaya',
'kode_relawan',
'pernyataan',

    ];
}
