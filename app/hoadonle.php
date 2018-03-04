<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadonle extends Model
{
    protected $timestamp = false;
    protected $incrementing = false;

    protected $table = 'hoadonle';
    protected $fillable = ['hdl_ma','hdl_nguoiMuaHang','hdl_dienThoai','hdl_diaChi','nv_lapHoaDon','hdl_ngayXuatHoaDon','dh_maFK'];

    protected $primaryKey = 'hdl_ma';
    protected $dates = 'hdl_ngayXuatHoaDon';
    protected $dateFormat = 'Y-m-d H:i:s';
}
