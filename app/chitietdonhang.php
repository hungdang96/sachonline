<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'chitietdonhang';
    protected $fillable = ['ctdh_soLuong','ctdh_donGia','s_maFK','dh_maFK'];
}
