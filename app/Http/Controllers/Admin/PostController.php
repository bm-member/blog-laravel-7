<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Image;
use App\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Traits\UploadTrait;

class PostController extends Controller
{
    use UploadTrait;

    function __construct()
    {
        $this->middleware('can:create post', ['only' => ['create', 'store']]);
        $this->middleware('can:edit post', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete post', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $posts = Post::when(request('search'), function($posts) {
            return $posts->where('title', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(config('pagination.post'));
        
        return view('admin.post.index', compact('posts')); 
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(PostStoreRequest $request)
    {

        $post = Post::create(
            $request->only('title', 'content') + ['user_id' => auth()->id()]
        );

        // what if image exists
        if($request->hasFile('image')) {

            $imagePath = config('path.image.post');

            foreach($request->file('image') as $image) {

                // Make a image name based on uniqid and post title
                $imageName = uniqid() . '_' . Str::snake($post->title) . '.' . $image->getClientOriginalExtension();
                $this->uploadFile($image, $imagePath, $imageName);

                // Save image's name in database
                Image::create([
                    'filename' => $imageName,
                    'imageable_id' => $post->id,
                    'imageable_type' => 'App\Post'
                ]);
            }
        }

        if($request->has('category_id')) {
            // Category
            $post->categories()->attach($request->category_id);
        }
        
        return redirect('admin/post')->with('success', 'A post created successfully.');
    }

    public function show(Post $post)
    {
        // $post = Post::find($id);
        return view('admin.post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(PostStoreRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->only('title', 'content'));

        // what if image exists
        if ($request->hasFile('image')) {
            // Define image path
            $imagePath = config('path.image.post');
            // Delete old images
            foreach($post->images as $oldImage) {
                $this->deleteUploadFile($imagePath, $oldImage->filename);
            }
            // Delete old image name in database
            $post->images()->delete();
            // Upload all images
            foreach ($request->file('image') as $image) {
                // Make a image name based on uniqid and post title
                $imageName = uniqid() . '_' . Str::slug($post->title) . '.' . $image->getClientOriginalExtension();
                // Upload image
                $file = $this->uploadFile($image, $imagePath, $imageName);
                // Save image in database
                Image::create([
                    'filename' => $imageName,
                    'imageable_id' => $post->id,
                    'imageable_type' => 'App\Post'
                ]);
            }
        }

        if ($request->has('category_id')) {
            // Category
            $post->categories()->sync([1]);
        }

        return redirect('admin/post')->with('success', 'A post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        // Define image path
        $imagePath = config('path.image.post');
        // Delete old images
        foreach ($post->images as $oldImage) {
            $this->deleteUploadFile($imagePath, $oldImage->filename);
        }
        $post->delete();
        return redirect('admin/post')->with('success', 'A post deleted successfully.');
    }
}
