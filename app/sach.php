<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sach extends Model
{
    const CREATED_AT = 's_tao';
    const UPDATED_AT = 's_capNhat';

    public $incrementing = false;
    protected $table = 'sach';
    protected $fillable = ['s_sku','s_ten','s_giaGoc','s_giaBan','s_soTrang','s_namXuatBan','s_tao','s_capNhat','s_kichThuoc','s_danhGia','s_loaiBia','s_trangThai','s_gioiThieu','nxb_maFK','tl_maFK','nn_maFK'];

    protected $primaryKey = 's_sku';
    protected $dates = ['s_tao','s_capNhat'];
    protected $dateFormat = "Y-m-d H:i:s";
}
