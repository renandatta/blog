<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLevel extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description'
    ];

    public function modules()
    {
        return $this->hasMany(UserLevelCredential::class)
            ->where('is_allowed', '=', 1);
    }
}
