<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tacgia extends Model
{
    const CREATED_AT = 'tg_taoMoi';
    const UPDATED_AT = 'tg_capNhat';
    public $incrementing = false;

    protected $table = 'tacgia';
    protected $fillable = ['tg_ma','tg_ten','tg_quocTich','tg_taoMoi','q_capNhat'];

     protected $primaryKey = 'tg_ma';

    protected $dates = ['tg_taoMoi','tg_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
