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
    public function __construct() {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }
    
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

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

    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();
        
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

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

    public function destroy(Post $post)
    {
        $this->authorize('author', $post);
        
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('info', 'Post Borrado con exito');
    }
}
