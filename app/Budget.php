<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = ['service_id','company_id','name','currency','price','delivery_time','quote_id'];
}
