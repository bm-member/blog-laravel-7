<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

}
