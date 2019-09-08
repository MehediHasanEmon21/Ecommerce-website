<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'shipping_name', 'shipping_address', 'shipping_mobile','shipping_city',
    ];
}
