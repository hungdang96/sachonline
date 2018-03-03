<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ngonngu extends Model
{
	protected $timestamp = false;
	
    protected $table = 'ngonngu';
    protected $fillable = ['nn_ten'];

    protected $primaryKey = 'nn_ma';

}
