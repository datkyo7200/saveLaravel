<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    //
    protected $fillable = [
        'brand_name',
        'desc',
        'status',
    ];
}
