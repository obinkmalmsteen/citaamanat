<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

protected $fillable = [
    'nama_barang',
    'jenis_id',
    'stok',
    'satuan',
    'harga',
    'keterangan',
];
   public function jenis()
{
    return $this->belongsTo(JenisBarang::class, 'jenis_id');
}

}
