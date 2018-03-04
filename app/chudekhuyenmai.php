<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chudekhuyenmai extends Model
{
    protected $timestamp = false;
    protected $incrementing = false;

    protected $table = 'chudekhuyenmai';
    protected $fillable = ['cdkm_giaTri','cdkm_trangThai','km_maFK','cd_maFK'];
}
