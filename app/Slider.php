<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
