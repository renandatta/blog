<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'city', 'address', 'media_id',
    ];

    public function reviews()
    {
        return $this->hasMany(ClientReview::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
