<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedPost extends Model
{
    protected $fillable = ['name'];

    public function details()
    {
        return $this->hasMany(FeaturedPostDetail::class);
    }
}
