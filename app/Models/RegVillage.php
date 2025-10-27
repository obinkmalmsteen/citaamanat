<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegVillage extends Model
{
    protected $table = 'reg_villages';
    protected $fillable = ['id', 'name', 'district_id'];
    public $timestamps = false;
}
