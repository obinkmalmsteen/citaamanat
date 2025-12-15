<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiHistori extends Model
{
    protected $table = 'donasi_histori';

    protected $fillable = [
        'donatur_id',
        'nominal_donasi',
    ];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'donatur_id');
    }
}
