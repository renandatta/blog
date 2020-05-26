<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'city', 'address',
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
