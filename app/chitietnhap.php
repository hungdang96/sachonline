<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietnhap extends Model
{
    protected $timestamp = false;
    public $incrementing = false;


    protected $table = 'chitietnhap';
    protected $fillable = ['ctn_soLuong','ctn_donGia','s_maFK','pn_maFK'];
}
