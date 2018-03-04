<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieunhap extends Model
{
    const CREATED_AT = 'pn_tao';
    const UPDATED_AT = 'pn_capNhat';

    protected $incrementing = false;

    protected $table = 'phieunhap';
    protected $fillable = ['pn_ma', 'pn_nguoiGiao', 'pn_soHoaDon', 'pn_ngayXuatHoaDon', 'nv_nguoiLapPhieu', 'pn_ngayNhapPhieu', 'nv_keToan', 'pn_ngayXacNhan', 'nv_thuKho', 'pn_ngayNhapKho', 'pn_tao', 'pn_capNhat', 'pn_trangThai', 'nph_maFK'];

    protected $primaryKey = 'pn_ma';

    protected $dates = ['pn_ngayXuatHoaDon', 'pn_ngayNhapPhieu', 'pn_ngayXacNhan', 'pn_ngayNhapKho', 'pn_tao','pn_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
