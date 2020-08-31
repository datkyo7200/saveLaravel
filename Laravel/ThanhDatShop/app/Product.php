<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'content',
        'price',
        'product_cat_id',
        'user_id',
        'thumbnail',
    ];
}
