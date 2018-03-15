<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gopy extends Model
{
    public $timestamps = false;

    protected $table = 'gopy';
    protected $fillable = ['gy_thoiGian','gy_noiDung','s_maFK','kh_maFK'];
    protected $guarded = 'gy_ma';

    protected $primaryKey = 'gy_ma';
    protected $dates = 'gy_noiDung';
    protected $dateFormat = 'Y-m-d H:i:s';
}
