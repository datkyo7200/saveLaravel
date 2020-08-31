<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\CategoryProduct;

class Product extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'name',
        'desc',
        'content',
        'price',
        'image',
        'status',
        'category_id',
        'brand_id',
    ];
    public function category()
    {
        return $this->belongsTo('App\CategoryProduct')->withDefault();
    }
}
