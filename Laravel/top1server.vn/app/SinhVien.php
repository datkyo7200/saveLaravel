<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    //
    public $timestamps = true;
    protected $table = 'sinhviens';
    protected $fillable = [
        'name', 'mssv', 'age',
    ];
}
