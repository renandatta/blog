<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientReview extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'client_id', 'review'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
