<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    const CREATED_AT = 'kh_taoMoi';
    const UPDATED_AT = 'kh_capNhat';
    public $incrementing = false;

    protected $table = 'khachhang';
    protected $fillable = ['kh_ma','kh_taiKhoan','kh_matKhau','kh_hoTen','kh_gioiTinh','kh_email','kh_ngaySinh','kh_diaChi','kh_soDienThoai','kh_taoMoi','kh_capNhat','kh_trangThai'];

    protected $primaryKey = 'kh_ma';
    protected $dates = ['kh_taoMoi','kh_capNhat','kh_ngaySinh'];
    protected $dateFormat = 'Y-m-d H:i:s';

}
