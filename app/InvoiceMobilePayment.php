<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InvoiceMobilePayment extends Model
{
    protected $dates = ['deleted_at'];
}
