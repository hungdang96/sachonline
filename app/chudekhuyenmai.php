<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chudekhuyenmai extends Model
{
    public $timestamps = false;
    public $incrementing = false;


    protected $table = 'chudekhuyenmai';
    protected $fillable = ['cdkm_giaTri','cdkm_trangThai','km_maFK','cd_maFK'];
}
