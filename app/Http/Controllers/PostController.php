<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SavePost;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::latest()->get();
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(SavePost $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->id() ? auth()->id() : 1;

        $post = Post::create($input);

        return redirect()->route('posts.index')
            ->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update1(SavePost $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request->all();
        $post->update($input);

        return redirect()->route('posts.index')
            ->with('success','Post update successfully');
    }

    public function update(SavePost $request, Post $post)
    {
        $input = $request->all();
        $post->update($input);

        return redirect()->route('posts.index')
            ->with('success','Post update successfully');

        // echo $request->route('post');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
 
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }

    public function destroy2(Post $post)
    {
        $post->delete();
 
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }
    
}
