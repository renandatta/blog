<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code', 'parent_code', 'type', 'name', 'action', 'icon',
    ];

    public function sub_modules()
    {
        return $this->hasMany(Module::class, 'parent_code', 'code');
    }
}
