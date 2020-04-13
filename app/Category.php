<?php

namespace App;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::title($value);
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
