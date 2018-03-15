<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thanhtoan extends Model
{
    const CREATED_AT = 'tt_tao';
    const UPDATED_AT = 'tt_capNhat';
    public $incrementing = false;

    protected $table = 'thanhtoan';
    protected $fillable = ['tt_ma','tt_ten','tt_dienGiai','tt_tao','tt_capNhat','tt_trangThai'];

     protected $primaryKey = 'tt_ma';

    protected $dates = ['tt_taoMoi','tt_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
