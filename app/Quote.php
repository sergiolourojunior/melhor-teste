<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['postal_code_from','postal_code_to','width','height','weight','length','receipt','own_hand','insurance_value'];
}
