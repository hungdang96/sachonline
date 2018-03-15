<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhaphathanh extends Model
{
    const CREATED_AT = 'nph_tao';
    const UPDATED_AT = 'nph_capNhat';

    public $incrementing = false;

    protected $table = 'nhaphathanh';
    protected $fillable = ['nph_ma','nph_ten', 'nph_daiDien', 'nph_diaChi', 'nph_soDienThoai', 'nph_email', 'nph_tao', 'nph_capNhat', 'nph_trangThai'];

    protected $primaryKey = 'nph_ma';

    protected $dates = ['nph_tao','nph_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
