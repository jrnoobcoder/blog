<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function readTime( $wordPerMinute = 100)
    {
        // Calculate the reading time based on the content length
        $wordCount = str_word_count(strip_tags($this->content));
        $readTime = ceil($wordCount / $wordPerMinute); // Assuming average reading speed of 200 words per minute
        return max(1,$readTime);
    }

    public function postImgUrl()
    {
        if ($this->image) {
            return(Storage::url($this->image));
        }
        return null;
    }


   

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
