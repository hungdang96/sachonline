<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chude extends Model
{
    const CREATED_AT = 'cd_taoMoi';
    const UPDATED_AT = 'cd_capNhat';
    protected $incrementing = false;

    protected $table = 'chude';
    protected $fillable = ['cd_ma','cd_ten','cd_dienGiai','cd_taoMoi','cd_capNhat','cd_trangThai','s_maFK'];

    protected $dates = ['cd_taoMoi','cd_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
