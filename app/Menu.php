<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Menu extends Model
{
    protected $dates = ['deleted_at'];
}
