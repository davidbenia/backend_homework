<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'post',
        'key_word',
        'vote_up',
        'vote_down'
    ];

    use HasFactory;
}
