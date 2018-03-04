<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhaxuatban extends Model
{
    protected $timestamp = false;
    protected $incrementing = false;

    protected $table = 'nhaxuatban';
    protected $fillable = ['nxb_ma','nxb_ten','nxb_diaChi'];

    protected $primaryKey = 'nxb_ma';
}
