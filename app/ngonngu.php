<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ngonngu extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'ngonngu';
    protected $fillable = ['nn_ma','nn_ten'];

    protected $primaryKey = 'nn_ma';
}
