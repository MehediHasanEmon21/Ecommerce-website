<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
     protected $fillable = [
        'name', 'slug', 'description', 'status',
    ];
}
