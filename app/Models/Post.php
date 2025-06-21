<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'title',
        'slug',
        'image',
        'excerpt',
        'content',
        'category_id',
        'user_id',
        'is_published',
        'published_at'
    ];
}
