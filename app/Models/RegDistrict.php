<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegDistrict extends Model
{
    protected $table = 'reg_districts';
    protected $fillable = ['id', 'name', 'regency_id'];
    public $timestamps = false;
}
