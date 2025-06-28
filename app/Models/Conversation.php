<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'user_id', 'user_name', 'message', 'reply', 'lang', 'is_from_bot'
    ];
}
