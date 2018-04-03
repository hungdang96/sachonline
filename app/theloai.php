<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    const CREATED_AT = 'tl_tao';
    const UPDATED_AT = 'tl_capNhat';
    public $incrementing = false;

    protected $table = 'theloai';
    protected $fillable = ['tl_ma','tl_ten', 'tl_tao','tl_capNhat','tl_trangThai'];

     protected $primaryKey = 'tl_ma';

    protected $dates = ['tl_tao','tl_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
