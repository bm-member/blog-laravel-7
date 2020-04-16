<?php

namespace App\Http\Controllers\Client;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        if(request('category')) {
            $category = Category::find(request('category'));
            $posts =  $category->posts()->orderBy('id', 'desc')
            ->paginate(config('const.post_paginate'));
        } else {
            $posts = Post::when(request('search'), function ($post) {
                return $post->where('title', 'like', '%' . request('search') . '%');
            })->orderBy('id', 'desc')->paginate(config('const.post_paginate'));
        }
        $categories = Category::all();
        return view('client.page.index', compact('posts', 'categories'));
    }

    public function postDetail(Post $post)
    {
        return view('client.page.post_detail', compact('post'));
    }
}
