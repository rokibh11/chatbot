<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_bn', 'description_bn', 'name_en', 'description_en', 'price', 'image'
    ];
}
