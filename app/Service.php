<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'media_id'
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
