<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedImage extends Model
{
    // One to one: Cấu hình quan hệ model
    function Product()
    {
        return $this->belongsTo('App\Product');
    }
}
