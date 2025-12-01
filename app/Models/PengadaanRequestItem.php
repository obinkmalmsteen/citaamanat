<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanRequestItem extends Model
{
    protected $table = 'pengadaan_request_items';

    protected $fillable = [
        'pengadaan_request_id','barang_id','qty','note','status'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function request()
    {
        return $this->belongsTo(PengadaanRequest::class, 'pengadaan_request_id');
    }
}
