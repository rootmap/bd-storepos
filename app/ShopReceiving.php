<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopReceiving extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'shop_to_shop_recevings';
}
