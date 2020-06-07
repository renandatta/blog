<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'title', 'meta_tags', 'meta_description', 'flag_slider', 'flag_service', 'flag_client', 'flag_client_review',
        'flag_partner', 'flag_post_comment', 'favicon', 'logo', 'banner'
    ];

    public function favicon_image()
    {
        return $this->belongsTo(Media::class, 'favicon', 'id');
    }

    public function logo_image()
    {
        return $this->belongsTo(Media::class, 'logo', 'id');
    }

    public function banner_image()
    {
        return $this->belongsTo(Media::class, 'banner', 'id');
    }
}
