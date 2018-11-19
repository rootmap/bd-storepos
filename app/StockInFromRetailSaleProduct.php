<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StockInFromRetailSaleProduct extends Model
{
    protected $dates = ['deleted_at'];
}
