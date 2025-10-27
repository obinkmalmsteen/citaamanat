<?php

namespace App\Models;

use App\Models\RegRegency;
use App\Models\RegVillage;
use App\Models\RegDistrict;
use App\Models\RegProvince;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masjid extends Model
{
    use HasFactory;
   

    // ✅ kasih tahu Laravel bahwa primary key-nya adalah id_pelanggan
    protected $primaryKey = 'id_pelanggan';

    // ✅ kalau kolom primary key bukan auto-increment, tambahkan:
    public $incrementing = false;

    // ✅ kalau tipe datanya bukan integer (misal string), tambahkan:
    protected $keyType = 'string';
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
'disetujui',

    ];
public function province()
{
    return $this->belongsTo(RegProvince::class, 'provinsi_id', 'id');
}

public function regency()
{
    return $this->belongsTo(RegRegency::class, 'kota_id', 'id');
}

public function district()
{
    return $this->belongsTo(RegDistrict::class, 'kecamatan_id', 'id');
}

public function village()
{
    return $this->belongsTo(RegVillage::class, 'kelurahan_id', 'id');
}




}
