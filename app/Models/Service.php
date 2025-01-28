<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name',
        'photo',
        'description',
        'price',
    ];
    
    public $timestamps = false;
}
