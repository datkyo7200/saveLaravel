<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
        'content',
        'price',
        'product_cat_id',
        'user_id',
        'thumbnail',
    ];
    // One to one: Cấu hình quan hệ model
    function FeaturedImages()
    {
        return $this->hasOne('App\FeaturedImages');
    }
    function User()
    {
        return $this->belongsTo('App\User');
    }
}
