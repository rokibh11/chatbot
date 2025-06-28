<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $fillable = [
        'question_bn', 'answer_bn', 'question_en', 'answer_en'
    ];
}
