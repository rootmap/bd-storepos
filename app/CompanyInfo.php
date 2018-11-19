<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyInfo extends Model
{
    protected $dates = ['deleted_at'];
}
