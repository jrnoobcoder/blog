<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    //
    protected $fillable = [
        'title',
        'slug',
        //'image',
        'excerpt',
        'content',
        'category_id',
        'user_id',
        'is_published',
        'published_at'
    ];


    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->width(400);
        $this->addMediaConversion('large')
            ->width(1200);
    }


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

    public function postImgUrl($conversionName = ''): mixed
    {
        //dd($this->getFirstMedia()->getUrl('preview'));
       $media = $this->getFirstMedia();

        if ($media) {
            return $media->getUrl($conversionName);
        }

        // Optionally return a fallback URL or null
        return null;
          
    }


   

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function claps()
    {
        return $this->hasMany(Clap::class);
    }
}
