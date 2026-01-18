<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriBayar extends Model
{
    // Tentukan nama tabel yang benar
    protected $table = 'histori_bayar';

    // Jika tabel tidak punya created_at / updated_at
   // public $timestamps = false;

    // (Opsional) Jika primary key bukan 'id'
    // protected $primaryKey = 'id_pelanggan';
     protected $fillable = [
        'id_pelanggan',
        'no_meteran_listrik',
        'nama_masjid',
        'no_token_listrik',
        'jumlah_realisasi_token',
        'tgl_realisasi_token',
        'pesan_terkirim_at'   
    ];

    protected $casts = [
    'pesan_terkirim_at' => 'datetime',
];


}
