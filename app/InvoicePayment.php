<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InvoicePayment extends Model
{
    protected $dates = ['deleted_at'];
}
