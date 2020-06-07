<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedPostDetail extends Model
{
    protected $fillable = [
        'featured_post_id', 'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
