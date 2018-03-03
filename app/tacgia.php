<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tacgia extends Model
{
    const CREATED_AT = 'tg_tao';
    const UPDATED_AT = 'tg_capNhat';

    protected $table = 'tacgia';
    protected $fillable = ['tg_ma', 'tg_ten', 'tg_quocTich', 'tg_tao', 'tg_capNhat', 's_maFK'];

    protected $primaryKey = 'tg_ma';

    protected $dates = ['tg_tao', 'tg_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';

}
