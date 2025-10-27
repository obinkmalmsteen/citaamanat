<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegRegency extends Model
{
    protected $table = 'reg_regencies';
    protected $fillable = ['id', 'name', 'province_id'];
    public $timestamps = false;
}
