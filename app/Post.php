<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'post_category_id', 'user_id', 'title', 'tags', 'date_published', 'content', 'meta_tags', 'meta_description', 'media_id'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function post_category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
}
