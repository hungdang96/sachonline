<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinhanh extends Model
{
    protected  $timestamp = false;
    protected $table = 'hinhanh';
    protected $fillable = ['ha_ten', 's_maFK'];
    protected  $guarded = 'ha_ma';
    protected $primaryKey = 'ha_ma';
}
