<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getPostImageLinkAttribute()
    {
        return  asset(config('const.path.image.post') . $this->filename);
    }
}
