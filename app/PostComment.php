<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostComment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'post_id', 'parent_id', 'name', 'email', 'comment',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id');
    }
}
