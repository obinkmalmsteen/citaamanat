<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_donatur',
        'alamat_donatur',
        'donatur_tetap',
        'logo_donatur',
        'jumlah_donasi'
    ];
}
