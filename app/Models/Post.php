<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'likes',
        'content',
    ];

// this will change in json files
    protected $casts = [
        'likes' => 'integer',
    ];
}
