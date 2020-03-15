<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(PostRequest $request)
    {
        // $request->validate([
        //     'title' => 'required|min: 2',
        //     'content' => 'required|min: 3',
        // ], [
        //     'title.required' => 'ခေါင်းစဉ်ထည့်ရန်လိုအပ်သည်။',
        //     'content.min' => 'အကြောင်းအရာအနည်းဆုံး ၃ လုံးထည့်ပါ။'
        // ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();
        return redirect('admin/post')->with('success', 'A post created successfully.');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|min: 2',
        //     'content' => 'required|min: 3',
        // ], [
        //     'title.required' => 'ခေါင်းစဉ်ထည့်ရန်လိုအပ်သည်။',
        //     'content.min' => 'အကြောင်းအရာအနည်းဆုံး ၃ လုံးထည့်ပါ။',
        // ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect('admin/post')->with('success', 'A post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/post')->with('success', 'A post deleted successfully.');
    }
}
