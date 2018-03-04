<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    const CREATED_AT = 'dh_taoMoi';
    const UPDATED_AT = 'dh_capNhat';
    protected $incrementing = false;

    protected $table = 'donhang';
    protected $fillable = ['dh_ma','dh_thoiGianDatHang','dh_nguoiNhan','dh_diaChi','dh_dienThoai','dh_nguoiGui','dh_daThanhToan','nv_xuLy','dh_ngayXuLy','nv_giaoHang','dh_ngayLapPhieuGiao','dh_ngayGiaoHang','dh_taoMoi','dh_capNhat','dh_trangThai','vc_maFK','tt_maFK'];

    protected $primaryKey = 'dh_ma';
    protected $dates = ['dh_thoiGianDatHang','dh_ngayXuLy','dh_ngayLapPhieuGiao','dh_ngayGiaoHang','dh_taoMoi','dh_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
