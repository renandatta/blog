<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLevelCredential extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_level_id', 'module_id'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function user_level()
    {
        return $this->belongsTo(UserLevel::class);
    }
}
