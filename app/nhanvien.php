<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    const CREATED_AT = 'nv_tao';
    const UPDATED_AT = 'nv_capNhat';

    protected $incrementing = false;

    protected $table = 'nhanvien';
    protected $fillable = ['nv_ma','nv_taiKhoan','nv_matKhau','nv_hoTen','nv_gioiTinh','nv_email','nv_ngaySinh','nv_diaChi','nv_soDienThoai','nv_tao','nv_capNhat','nv_trangThai', 'q_maFK'];
    protected $primaryKey = 'nv_ma';

    protected $dates = ['nv_tao','nv_capNhat','nv_ngaySinh'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
