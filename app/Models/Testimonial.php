<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
     protected $fillable = [
        'id_testimonial',
        'ucapan',
        'photo',
        'video',
        'keterangan',
       
  

    ];
}
