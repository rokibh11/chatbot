<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingData extends Model
{
    protected $fillable = [
        'question', 'answer', 'lang', 'image'
    ];
}
