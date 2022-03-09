<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'status' => $request->status,
            'extract' => $request->extract,
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        if($request->tags) {
            $post->tags()->attach($request->tags);
        }

        if($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.posts.edit', compact('post'))
            ->with('info', 'Post creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();
        
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'status' => $request->status,
            'extract' => $request->extract,
            'body' => $request->body,
        ]);

        if($request->tags) {
            $post->tags()->sync($request->tags);
        }

        if($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));

            if($post->image) {
                Storage::delete($post->image->url);

                $post->image()->update([
                    'url' => $url
                ]);
            }else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();

        return redirect()->route('admin.posts.edit', compact('post', 'categories', 'tags'))
            ->with('info', 'Post actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
