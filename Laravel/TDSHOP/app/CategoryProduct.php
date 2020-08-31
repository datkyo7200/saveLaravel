<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    public $timestamps = true;
    protected $table ='category_products';
    protected $fillable = [
        'category_name',
        'desc',
        'status',
    ];
}
