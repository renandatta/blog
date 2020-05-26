<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class PostCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'media_id'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
