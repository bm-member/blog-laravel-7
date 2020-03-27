<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // protected $fillable = ['title', 'content', 'user_id'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
