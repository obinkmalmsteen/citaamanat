<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanRequest extends Model
{
    protected $table = 'pengadaan_requests';

    protected $fillable = [
        'kode','user_id','cabang_id','status','note','approved_by','approval_note','approved_at'
    ];

    public function items()
    {
        return $this->hasMany(PengadaanRequestItem::class, 'pengadaan_request_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
