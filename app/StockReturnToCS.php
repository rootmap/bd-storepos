<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockReturnToCS extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'stock_return_to_c_s';
}
