<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class MobileTestimonial extends Model
{
    protected $table = 'testimonials';

    // 🔥 WAJIB
    protected $primaryKey = 'id_testimonial';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_testimonial', // kode pelanggan PLN (varchar)
        'ucapan',
        'photo',
        'video',
        'keterangan',
    ];

    // Relasi ke User (opsional, tapi aman)
    public function user()
    {
        return $this->belongsTo(User::class, 'nama', 'id_testimonial');
        // local key: users.nama
        // foreign key: testimonials.id_testimonial
    }
}

