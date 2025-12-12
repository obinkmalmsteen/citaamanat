<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestPerbaikan extends Model
{
    protected $fillable = [
        'kode', 'user_id', 'cabang_id',
        'area_perbaikan', 'jenis_kerusakan',
        'type_perbaikan', 'estimasi_biaya', 'keterangan','foto1','foto2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }
}
