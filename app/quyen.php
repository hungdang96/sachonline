<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quyen extends Model
{
    const CREATED_AT = 'q_taoMoi';
    const UPDATED_AT = 'q_capNhat';
    protected $incrementing = false;

    protected $table = 'quyen';
    protected $fillable = ['q_ma','q_ten','q_dienGiai','q_taoMoi','q_capNhat','q_trangThai'];

     protected $primaryKey = 'q_ma';

    protected $dates = ['q_taoMoi','q_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
