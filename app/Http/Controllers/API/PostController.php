<?php

namespace App\Http\Controllers\API;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = DB::table('users')->where('id', '1')->get();
        // return $posts;

        // $posts = Post::select('id', 'title', 'content', 'user_id')->with('user', 'categories')->get();
        // return $posts;

        // $posts = Post::with('user', 'categories')->get();
        // return $posts;

        $posts = Post::orderBy('id', 'desc')->get();
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $post = New Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->user_id = 1;
        // $post->save();

        $post = Post::create($request->all());

        // $post = Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content
        // ]);


        return response()->json([
            ['message' => 'A post created.'],
            ['data' => $post ]
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('user', 'categories')->find($id);
        if(!$post) {
            return 'Post not found.';
        }
        return $post;
        // return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->only('title', 'content'));
        // $post = Post::find($id);
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        return response(['msg' => 'A Post updated'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = Post::find($id);

        
        // if(!$post) {
            //     return response(['msg' => 'A Post not found'], 400);
            // }
            
            // $post->delete();

        Post::destroy([1,2,3,4,5]);
        return response(['msg' => 'A Post deleted'], 200);

    }
}
