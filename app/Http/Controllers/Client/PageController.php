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
        if(request('q')) {
            $posts = Post::where('title', 'like', '%' . request('q') . '%')
            ->orderBy('id', 'desc')->paginate(config('const.post_paginate'));
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(config('const.post_paginate'));
        }
        
        $categories = Category::all();

        return view('client.page.index', compact('posts', 'categories'));
    }

    public function postDetail($id)
    {
        $post = Post::findOrFail($id);

        // if(!$post) {
        //     abort(404);
        // }

        return view('client.page.post_detail', compact('post'));
    }

    public function postByCategory($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('client.page.index', [
            'posts' => $category->posts()->paginate(3),
            'categories' => $categories
        ]);
    }
}
