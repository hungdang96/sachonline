<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khuyenmai extends Model
{
    const CREATED_AT = 'km_tao';
    const UPDATED_AT = 'km_capNhat';
    public $incrementing = false;

    protected $table = 'khuyenmai';
    protected $fillable = ['km_ma','km_ten','km_noiDung','km_batDau','km_ketThuc','km_giaTri','nv_nguoiLap','nv_kyNhay','km_ngayKyNhay','nv_kyDuyet','km_ngayDuyet','km_tao','km_capNhat','km_trangThai'];

    protected $primaryKey = 'km_ma';
    protected $dates = ['km_batDau','km_ketThuc','km_ngayKyNhay','km_ngayDuyet','km_tao','km_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
