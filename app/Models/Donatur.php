<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'donaturs';

    protected $fillable = [
        'nama_donatur',
        'alamat_donatur',
        'donatur_tetap',
        'logo_donatur',
        'jumlah_donasi',
        'web_address',
    ];

    // tambahkan ini ⬇️
    public function donasi()
    {
        return $this->hasMany(DonasiHistori::class, 'donatur_id');
    }

    public function totalDonasi()
    {
        return $this->donasi()->sum('nominal_donasi');
    }
}
