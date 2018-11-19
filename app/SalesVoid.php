<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesVoid extends Model
{
    protected $dates = ['deleted_at'];
}
