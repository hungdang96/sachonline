<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dichgia extends Model
{
    public $incrementing = false;

    const CREATED_AT = 'dg_taoMoi';
    const UPDATED_AT = 'dg_capNhat';

    protected $table = 'dichgia';
    protected $fillable = ['dg_ma','dg_ten','dg_taoMoi','dg_capNhat','s_maFK'];

    protected $primaryKey = 'dg_ma';
    protected $dates = ['dg_taoMoi','dg_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
